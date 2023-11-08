<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class FilterController extends Controller
{
    public function filter(Request $request) {
        $vehicles = Vehicle::get(['id','name','image','service_id']);
        $user_filters = json_decode(User::whereId(auth()->id())->first()->user_filters, true);
        // return $user_filters;
        $selected_services = collect($user_filters['selected_services']);
        $selected_vehicles = collect($user_filters['selected_vehicles']);

        $services = Category::get(['id','service'])->map(function ($service) use($vehicles, $selected_vehicles, $selected_services){
            $service_vehicles  = $vehicles->filter(function($vehicle) use($service){
                return $vehicle->service_id == $service->id;
            })->values()->map(function($service) use ($selected_vehicles) {
                $service['is_checked'] = $selected_vehicles->contains($service->id);
                return $service;
            });

            $service['is_checked'] = $selected_services->contains($service->id);
            $service['vehicles'] = $service_vehicles;
            return $service;
        });

        return apiSuccessMessage("Data", [ 'data' => $services, 'user_filter' => $user_filters]);
    }
}
