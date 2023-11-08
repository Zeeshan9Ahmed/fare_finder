<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\AppException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CalculateFarePriceRequest;
use App\Models\Category;
use App\Models\FareHistory;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class FarePriceController extends Controller
{

    public function calculateDistances2 ($origins = null , $destinations = null) {
        
        $origins = [
            'Park Avenue, Shahrah-e-Faisal Road, Pakistan Employees Co-Operative Housing Society Block 6 PECHS, Karachi',
            'Tariq Road, Pakistan Employees Co-Operative Housing Society Block 2 PECHS, Karachi',
            
            'Saddar mobile market, Garden Road, Saddar Preedy Quarters, Karachi',
        ];
    
        $destinations = [
            // 'New York, USA',
            'Tariq Road, Pakistan Employees Co-Operative Housing Society Block 2 PECHS, Karachi',
            'Saddar mobile market, Garden Road, Saddar Preedy Quarters, Karachi',
            'Block 19 Gulistan-e-Johar, Karachi'
        ];

        
        $data = $this->getDistanceMatrix($origins, $destinations);

        if ($data['status'] !== "OK") {
            throw new AppException('Something went wrong.');
        }
        $totalDistance = 0;
        $totalTime = 0;
      
        foreach ($data['rows'] as $row_key => $row) {
            // echo $row['status'];
            foreach ($row['elements'] as $element_key => $element) {
                $status = $element['status'];
                if ($row_key == $element_key ) {

                    if ($status == "ZERO_RESULTS") {
                        throw new AppException('Out of range distance.');
                    }

                    if ($status == "NOT_FOUND") {
                        throw new AppException('Given Address Not Found');
                    }

                    if ($status == "OK") {
                        // $distanceText = $element['distance']['text'];
                        $distanceValue = $element['distance']['value'];
                        // $durationText = $element['duration']['text'];
                        $durationValue = $element['duration']['value'];

                        $totalTime += $durationValue/60;
                        $totalDistance += $distanceValue/1609;
                     
                    }

                }
        
            }
        }

   

        return [
            'totalDistance' => $totalDistance,
            'totalTime' => $totalTime,
            'distanceText' => round($totalDistance, 2)." mi",
        ];
    }
    public function getDistanceMatrix($origins, $destinations)
    {

        $config = config('fare_finder');
        $client = new Client();
        $response = $client->get($config['distanceMatrixApi'] , [
            'query' => [
                'units' => 'imperial',
                'origins' => implode('|', $origins),
                'destinations' => implode('|', $destinations),
                'key' => $config['apiKey'],
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        return $data;
    }
    public function calculateFarePrice(CalculateFarePriceRequest $request)
    {

     
        try {

            
            // return $request->all();
            $config = config('fare_finder');
            $selected_services = [];
            $selected_vehicles = [];
            $destinations = $request->destination_address;
            $origins = $request->origin_address;
            $stateName = $request->state_name;

            if ($request->apply_filter == 0) {
                // return $origins;
                // return $request->all();
                $distance_information = $this->calculateDistances2($origins, $destinations);
                
                //Fetching StateName
                $stateName = $this->getStateNameFromLocation($origins[0]);

                if ($stateName == null) {
                    return commonErrorMessage("Something went wrong, please try again", 400);
                }
                
            } else {

                $distance_information = json_decode($request->distance_information, true);
                // $distance_information = json_decode($request->distance_information, false);
                // $user_filters = json_decode($request->user_filter, true);

                $services_and_vehicles_ids = Category::with('vehicles:id,service_id')->get('id');

                $selected_services = collect($request->selected_services)->intersect($services_and_vehicles_ids->pluck('id'));
                // return $selected_services;
                $selected_vehicles = collect($request->selected_vehicles)->intersect($services_and_vehicles_ids
                    ->whereIn('id', $selected_services)
                    ->values()
                    ->pluck('vehicles')
                    ->flatten()
                    ->pluck('id'))
                    ->values();
                // return $selected_vehicles;
                User::whereId(auth()->id())->update(['user_filters' => json_encode(['selected_services' => $selected_services, 'selected_vehicles' => $selected_vehicles])]);
            }

            // Base Fare + (Cost per minute * time in ride) + (Cost per mile * ride distance) + Booking Fee = Your Fare


            $vehicles = Vehicle::
            join('vehicle_ride_charge_state_wises', function ($vehicle_ride_charge_state_wises) {
                $vehicle_ride_charge_state_wises->on('vehicle_ride_charge_state_wises.vehicle_id', '=', 'vehicles.id')
                ->join('states', function ($states) {
                    $states->on('vehicle_ride_charge_state_wises.state_id','=', 'states.id');
                });
            })
            ->when(
                $request->apply_filter  && $request->save_location == 0,
                function ($query) use ($selected_vehicles) {
                    $query->whereIn('vehicles.id', $selected_vehicles);
                }
            )
            ->select('vehicles.id',
                    'vehicles.name',
                    'vehicles.image',
                    'vehicles.persons_capacity',
                    'vehicle_ride_charge_state_wises.base_fare',
                    'vehicle_ride_charge_state_wises.cost_per_minute',
                    'vehicle_ride_charge_state_wises.cost_per_mile',
                    'vehicle_ride_charge_state_wises.booking_fee',
            )
            ->where(function ($query) use ($stateName){
                $query->where('states.state_name','=',$stateName);
                // ->orWhere('states.abbreviation','=', 'AL');
            })
            ->get()
                ->map(function ($vehicle) use ($distance_information) {
                    
                    $distance = $distance_information['totalDistance'];
                    $duration = $distance_information['totalTime'];
                    $distanceText = $distance_information['distanceText'];

                    $fare =  $vehicle->base_fare + ($vehicle->cost_per_minute * ($duration)) + ($vehicle->cost_per_mile * ($distance)) + $vehicle->booking_fee;
                    return [
                        'id' => $vehicle->id,
                        'name' => $vehicle->name,
                        'image' => $vehicle->image,
                        'persons_capacity' => $vehicle->persons_capacity,
                        'estimated_distance' => $distanceText,
                        'estimated_fare' =>  round(number_format((float)$fare, 2, '.', '')) . " - ". round(number_format((float)$fare, 2, '.', '')) +3
                    ];
                });
            
            // return $vehicles;
            if ($request->save_location && $vehicles->count() > 0) {
                $points = array_merge([reset($origins)], $destinations);
                // $this->saveFareHistory($destinations, $origins, $vehicles, auth()->id());
            }

            return apiSuccessMessage("Success", ['data' => $vehicles, 'state_name' => $stateName ,'distance_information' => $distance_information]);
        } catch (\Throwable $th) {
            return throw $th;
            // return commonErrorMessage("Success", $th);

            throw new AppException("Something went wrong while fetching data");
        }
    }


    public function saveFareHistory($destination_address, $origin_address, $data, $user_id)
    {
        FareHistory::create(['data' => $data, 'destination_address' => $destination_address, 'origin_address' => $origin_address, 'user_id' => $user_id]);
    }

    public function fareHistory(Request $request)
    {

        $date = $request->has('date') ? Carbon::parse($request->date) : "";
        // dd($date);
        $location = $request->location;
        $history = FareHistory::
            where('user_id', auth()->id())
            ->when($location, function ($query) use ($location) {
                
                // $query->where('destination_address', 'like', '%' . $location . '%')
                //     ->orWhere('origin_address', 'like', '%' . $location . '%');
            })
            ->when($date, function ($date_query) use ($date) {
                $date_query->whereDate('created_at', $date);
            })

            ->get()

            ->map(function ($history) {
                return [
                    'id' => $history->id,
                    // 'user_id' => $history->user_id,
                    'points' => json_decode($history->points),
                    'destination_address' => $history->destination_address,
                    'date' => $history->created_at->format('d M Y'),
                    'origin_address' => $history->origin_address,
                    'data' => json_decode($history->data),
                ];
            });
        return apiSuccessMessage("Success", $history);
    }


    public function getStateNameFromLocation($location)
    {
        $client = new Client();
        $apiKey = config('fare_finder')['apiKey'];
        $location = $location; // or latitude and longitude
        $mapApi = config('fare_finder')['googleMapsApi'];
        $response = $client->get($mapApi, [
            'query' => [
                'address' => $location,
                'key' => $apiKey,
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        // return $data;

        $stateName = null;

        if ($data['status'] === 'OK' && isset($data['results'][0]['address_components'])) {
            foreach ($data['results'][0]['address_components'] as $component) {
                if (in_array('administrative_area_level_1', $component['types'])) {
                    $stateName = $component['long_name'];
                    break;
                }
            }
        }

        return $stateName;
    }
}




// public function calculateFarePrice(CalculateFarePriceRequest $request)
//     {

     
//         try {

            
//             // return $request->all();
//             $config = config('fare_finder');
//             $selected_services = [];
//             $selected_vehicles = [];
//             $destinations = $request->destination_address;
//             $origins = $request->origin_address;
//             $stateName = $request->state_name;

//             if ($request->apply_filter == 0) {
//                 $response =  Http::get($config['distanceMatrixApi'] . "?destinations=$destinations&origins=$origins&units=imperial&key=".$config['apiKey']);
//                 $data = $response->json();
                
//                 if ($data['status'] !== "OK") {
//                     return commonErrorMessage("Something Went Wrong", 400);
//                 }

                
                
//                 $distance_information =  $data['rows'][0]['elements'][0];
                
//                 if ($distance_information['status'] == 'NOT_FOUND') {
//                     return commonErrorMessage("Given Address Not Found", 400);
//                 }
                
//                 if ($distance_information['status'] == 'ZERO_RESULTS') {
//                     return commonErrorMessage("Out of range distance.", 400);
//                 }
                
//                 //Fetching StateName
//                 $stateName = $this->getStateNameFromLocation($origins);

//                 if ($stateName == null) {
//                     return commonErrorMessage("Something went wrong, please try again", 400);
//                 }
                
//             } else {

//                 $distance_information = json_decode($request->distance_information, true);
//                 // $distance_information = json_decode($request->distance_information, false);
//                 // $user_filters = json_decode($request->user_filter, true);

//                 $services_and_vehicles_ids = Category::with('vehicles:id,service_id')->get('id');

//                 $selected_services = collect($request->selected_services)->intersect($services_and_vehicles_ids->pluck('id'));
//                 // return $selected_services;
//                 $selected_vehicles = collect($request->selected_vehicles)->intersect($services_and_vehicles_ids
//                     ->whereIn('id', $selected_services)
//                     ->values()
//                     ->pluck('vehicles')
//                     ->flatten()
//                     ->pluck('id'))
//                     ->values();
//                 // return $selected_vehicles;
//                 User::whereId(auth()->id())->update(['user_filters' => json_encode(['selected_services' => $selected_services, 'selected_vehicles' => $selected_vehicles])]);
//             }

//             // Base Fare + (Cost per minute * time in ride) + (Cost per mile * ride distance) + Booking Fee = Your Fare


//             $vehicles = Vehicle::
//             join('vehicle_ride_charge_state_wises', function ($vehicle_ride_charge_state_wises) {
//                 $vehicle_ride_charge_state_wises->on('vehicle_ride_charge_state_wises.vehicle_id', '=', 'vehicles.id')
//                 ->join('states', function ($states) {
//                     $states->on('vehicle_ride_charge_state_wises.state_id','=', 'states.id');
//                 });
//             })
//             ->when(
//                 $request->apply_filter  && $request->save_location == 0,
//                 function ($query) use ($selected_vehicles) {
//                     $query->whereIn('vehicles.id', $selected_vehicles);
//                 }
//             )
//             ->select('vehicles.id',
//                     'vehicles.name',
//                     'vehicles.image',
//                     'vehicles.persons_capacity',
//                     'vehicle_ride_charge_state_wises.base_fare',
//                     'vehicle_ride_charge_state_wises.cost_per_minute',
//                     'vehicle_ride_charge_state_wises.cost_per_mile',
//                     'vehicle_ride_charge_state_wises.booking_fee',
//             )
//             ->where(function ($query) use ($stateName){
//                 $query->where('states.state_name','=',$stateName);
//                 // ->orWhere('states.abbreviation','=', 'AL');
//             })
//             ->get()
//                 ->map(function ($vehicle) use ($distance_information) {
                    
//                     $distance = $distance_information['distance'];
//                     $duration = $distance_information['duration'];

//                     $fare =  $vehicle->base_fare + ($vehicle->cost_per_minute * ($duration['value']/60)) + ($vehicle->cost_per_mile * ($distance['value']  / 1609)) + $vehicle->booking_fee;
//                     return [
//                         'id' => $vehicle->id,
//                         'name' => $vehicle->name,
//                         'image' => $vehicle->image,
//                         'persons_capacity' => $vehicle->persons_capacity,
//                         'estimated_distance' => $distance['text'],
//                         'estimated_fare' =>  round(number_format((float)$fare, 2, '.', '')) . " - ". round(number_format((float)$fare, 2, '.', '')) +3
//                     ];
//                 });
            

//             if ($request->save_location && $vehicles->count() > 0) {
//                 $this->saveFareHistory($destinations, $origins, $vehicles, auth()->id());
//             }
//             return apiSuccessMessage("Success", ['data' => $vehicles, 'state_name' => $stateName ,'distance_information' => $distance_information]);
//         } catch (\Throwable $th) {
//             // return throw $th;
//             // return commonErrorMessage("Success", $th);

//             throw new AppException("Something went wrong while fetching data");
//         }
//     }
