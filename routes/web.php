<?php

use App\Http\Controllers\Api\User\Profile\ProfileController;
use App\Http\Controllers\HomeController;
use App\Models\State;
use App\Models\VehicleRideChargeStateWise;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('csv', function(){
    return view('csv');
});

Route::post('csv', function(){
    // dd(request()->all());
    if ($_FILES['file']['name']) {
        $filename = explode(".", $_FILES['file']['name']);
        // $array_data = array();
        if ($filename[1] == 'csv') {
            $handle = fopen($_FILES['file']['tmp_name'], "r");
            $state_id = 1;
            $vehicle_id = 1;
            while ($data = fgetcsv($handle)) {
                
                $base_fare = (float) str_replace('$', '', $data[2]);
                $cost_per_minute =(float) str_replace('$', '', $data[3]);
                $cost_per_mile =(float) str_replace('$', '', $data[4]);
                $booking_fee = (float) str_replace('$', '', $data[5]);

                if($base_fare !==0.0 && $cost_per_minute !==0.0  && $cost_per_mile !==0.0  && $booking_fee !==0.0 ){
                    $information = [
                        'vehicle_id' => $vehicle_id,
                        'state_id' => $state_id,
                        'base_fare' => str_replace('$', '', $data[2]),
                        'cost_per_minute' => str_replace('$', '', $data[3]),
                        'cost_per_mile' => str_replace('$', '', $data[4]),
                        'booking_fee' => str_replace('$', '', $data[5]),
                    ];
                    // VehicleRideChargeStateWise::create($information);
                    $state_id++;
                }else {
                    $vehicle_id++;            
                    $state_id = 1;
                    // $vehicle_id = 1;
                    echo $vehicle_id;
                } 
    
            }   
    
    
            fclose($handle);
            return 'success';
        }
        return false;
    }
});



Route::get('/', function () {

    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('web.dashboard');
});

Route::get('content/{type}', [HomeController::class,'content']);
