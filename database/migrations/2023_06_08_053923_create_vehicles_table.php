<?php

use App\Models\Vehicle;
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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('service_id')->constrained('categories')->onDelete('cascade');
            $table->string('persons_capacity')->nullable();
            $table->timestamps();
        });

        $uber_cars = ['UberX', 'UberXL','Uber Comfort', 'Uber Black','Uber Black XL'];
        $lyft_cars = ['Lyft', 'Lyft XL','Lyft Lux', 'Lyft Plus','Lyft Black'];
        $curb_cars = ['Standard Taxi', 'WAV (Wheelchair Accessible Vehicle)','Standard Car', 'SUV','Luxury Car'];
        // foreach($uber_cars as $uber_car) {
        //     Vehicle::create([
        //         'name' => $uber_car,
        //         'image' => 'https://s.yimg.com/ny/api/res/1.2/Xj05SXWtwp9ktjKIrAplpw--/YXBwaWQ9aGlnaGxhbmRlcjt3PTY0MDtoPTQyNw--/https://s.yimg.com/os/creatr-uploaded-images/2021-04/6031a890-9b9d-11eb-93bf-f9d0aa515883',
        //         'service_id' => 1,
        //         'persons_capacity' => '1 - 3',
        //     ]);
        // }

        // foreach($lyft_cars as $lyft_car) {
        //     Vehicle::create([
        //         'name' => $lyft_car,
        //         'image' => 'https://s.yimg.com/ny/api/res/1.2/N322FOOnAdfr5rjycgyGsg--/YXBwaWQ9aGlnaGxhbmRlcjt3PTY0MDtoPTQyNw--/https://media.zenfs.com/en/Benzinga/f25cb2df7f0843647addea62bf15a3d5',
        //         'service_id' => 2,
        //         'persons_capacity' => '1 - 3',
        //     ]);
        // }

        // foreach($curb_cars as $curb_car) {
        //     Vehicle::create([
        //         'name' => $curb_car,
        //         'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKzLQT2CS27EFKTXKo6ymCeq2xmjSG5gOGMg&usqp=CAU',
        //         'service_id' => 3,
        //         'persons_capacity' => '4 - 3',
        //     ]);
        // }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
