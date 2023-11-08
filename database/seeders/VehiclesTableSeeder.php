<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VehiclesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vehicles')->delete();
        
        \DB::table('vehicles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'UberX',
                'image' => 'https://s.yimg.com/ny/api/res/1.2/Xj05SXWtwp9ktjKIrAplpw--/YXBwaWQ9aGlnaGxhbmRlcjt3PTY0MDtoPTQyNw--/https://s.yimg.com/os/creatr-uploaded-images/2021-04/6031a890-9b9d-11eb-93bf-f9d0aa515883',
                'service_id' => 1,
                'persons_capacity' => '1 - 3',
                'created_at' => '2023-06-15 05:53:02',
                'updated_at' => '2023-06-15 05:53:02',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'UberXL',
                'image' => 'https://s.yimg.com/ny/api/res/1.2/Xj05SXWtwp9ktjKIrAplpw--/YXBwaWQ9aGlnaGxhbmRlcjt3PTY0MDtoPTQyNw--/https://s.yimg.com/os/creatr-uploaded-images/2021-04/6031a890-9b9d-11eb-93bf-f9d0aa515883',
                'service_id' => 1,
                'persons_capacity' => '1 - 3',
                'created_at' => '2023-06-15 05:53:02',
                'updated_at' => '2023-06-15 05:53:02',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Uber Comfort',
                'image' => 'https://s.yimg.com/ny/api/res/1.2/Xj05SXWtwp9ktjKIrAplpw--/YXBwaWQ9aGlnaGxhbmRlcjt3PTY0MDtoPTQyNw--/https://s.yimg.com/os/creatr-uploaded-images/2021-04/6031a890-9b9d-11eb-93bf-f9d0aa515883',
                'service_id' => 1,
                'persons_capacity' => '1 - 3',
                'created_at' => '2023-06-15 05:53:02',
                'updated_at' => '2023-06-15 05:53:02',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Uber Black',
                'image' => 'https://s.yimg.com/ny/api/res/1.2/Xj05SXWtwp9ktjKIrAplpw--/YXBwaWQ9aGlnaGxhbmRlcjt3PTY0MDtoPTQyNw--/https://s.yimg.com/os/creatr-uploaded-images/2021-04/6031a890-9b9d-11eb-93bf-f9d0aa515883',
                'service_id' => 1,
                'persons_capacity' => '1 - 3',
                'created_at' => '2023-06-15 05:53:02',
                'updated_at' => '2023-06-15 05:53:02',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Uber Black XL',
                'image' => 'https://s.yimg.com/ny/api/res/1.2/Xj05SXWtwp9ktjKIrAplpw--/YXBwaWQ9aGlnaGxhbmRlcjt3PTY0MDtoPTQyNw--/https://s.yimg.com/os/creatr-uploaded-images/2021-04/6031a890-9b9d-11eb-93bf-f9d0aa515883',
                'service_id' => 1,
                'persons_capacity' => '1 - 3',
                'created_at' => '2023-06-15 05:53:02',
                'updated_at' => '2023-06-15 05:53:02',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Lyft',
                'image' => 'https://s.yimg.com/ny/api/res/1.2/N322FOOnAdfr5rjycgyGsg--/YXBwaWQ9aGlnaGxhbmRlcjt3PTY0MDtoPTQyNw--/https://media.zenfs.com/en/Benzinga/f25cb2df7f0843647addea62bf15a3d5',
                'service_id' => 2,
                'persons_capacity' => '1 - 3',
                'created_at' => '2023-06-15 05:53:02',
                'updated_at' => '2023-06-15 05:53:02',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Lyft XL',
                'image' => 'https://s.yimg.com/ny/api/res/1.2/N322FOOnAdfr5rjycgyGsg--/YXBwaWQ9aGlnaGxhbmRlcjt3PTY0MDtoPTQyNw--/https://media.zenfs.com/en/Benzinga/f25cb2df7f0843647addea62bf15a3d5',
                'service_id' => 2,
                'persons_capacity' => '1 - 3',
                'created_at' => '2023-06-15 05:53:02',
                'updated_at' => '2023-06-15 05:53:02',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Lyft Lux',
                'image' => 'https://s.yimg.com/ny/api/res/1.2/N322FOOnAdfr5rjycgyGsg--/YXBwaWQ9aGlnaGxhbmRlcjt3PTY0MDtoPTQyNw--/https://media.zenfs.com/en/Benzinga/f25cb2df7f0843647addea62bf15a3d5',
                'service_id' => 2,
                'persons_capacity' => '1 - 3',
                'created_at' => '2023-06-15 05:53:02',
                'updated_at' => '2023-06-15 05:53:02',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Lyft Plus',
                'image' => 'https://s.yimg.com/ny/api/res/1.2/N322FOOnAdfr5rjycgyGsg--/YXBwaWQ9aGlnaGxhbmRlcjt3PTY0MDtoPTQyNw--/https://media.zenfs.com/en/Benzinga/f25cb2df7f0843647addea62bf15a3d5',
                'service_id' => 2,
                'persons_capacity' => '1 - 3',
                'created_at' => '2023-06-15 05:53:02',
                'updated_at' => '2023-06-15 05:53:02',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Lyft Black',
                'image' => 'https://s.yimg.com/ny/api/res/1.2/N322FOOnAdfr5rjycgyGsg--/YXBwaWQ9aGlnaGxhbmRlcjt3PTY0MDtoPTQyNw--/https://media.zenfs.com/en/Benzinga/f25cb2df7f0843647addea62bf15a3d5',
                'service_id' => 2,
                'persons_capacity' => '1 - 3',
                'created_at' => '2023-06-15 05:53:02',
                'updated_at' => '2023-06-15 05:53:02',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Standard Taxi',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKzLQT2CS27EFKTXKo6ymCeq2xmjSG5gOGMg&usqp=CAU',
                'service_id' => 3,
                'persons_capacity' => '4 - 3',
                'created_at' => '2023-06-15 05:53:02',
                'updated_at' => '2023-06-15 05:53:02',
            ),
            11 => 
            array (
                'id' => 12,
            'name' => 'WAV (Wheelchair Accessible Vehicle)',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKzLQT2CS27EFKTXKo6ymCeq2xmjSG5gOGMg&usqp=CAU',
                'service_id' => 3,
                'persons_capacity' => '4 - 3',
                'created_at' => '2023-06-15 05:53:02',
                'updated_at' => '2023-06-15 05:53:02',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Standard Car',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKzLQT2CS27EFKTXKo6ymCeq2xmjSG5gOGMg&usqp=CAU',
                'service_id' => 3,
                'persons_capacity' => '4 - 3',
                'created_at' => '2023-06-15 05:53:02',
                'updated_at' => '2023-06-15 05:53:02',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'SUV',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKzLQT2CS27EFKTXKo6ymCeq2xmjSG5gOGMg&usqp=CAU',
                'service_id' => 3,
                'persons_capacity' => '4 - 3',
                'created_at' => '2023-06-15 05:53:02',
                'updated_at' => '2023-06-15 05:53:02',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Luxury Car',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKzLQT2CS27EFKTXKo6ymCeq2xmjSG5gOGMg&usqp=CAU',
                'service_id' => 3,
                'persons_capacity' => '4 - 3',
                'created_at' => '2023-06-15 05:53:02',
                'updated_at' => '2023-06-15 05:53:02',
            ),
        ));
        
        
    }
}