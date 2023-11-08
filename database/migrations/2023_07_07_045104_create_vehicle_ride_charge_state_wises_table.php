<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_ride_charge_state_wises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained('vehicles')->onDelete('cascade');
            $table->foreignId('state_id')->constrained('states')->onDelete('cascade');
            $table->decimal('base_fare')->nullable();
            $table->decimal('cost_per_minute')->nullable();
            $table->decimal('cost_per_mile')->nullable();
            $table->decimal('booking_fee')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_ride_charge_state_wises');
    }
};
