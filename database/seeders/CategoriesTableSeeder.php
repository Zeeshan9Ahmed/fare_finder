<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'service' => 'Uber',
                'created_at' => '2023-06-15 05:53:02',
                'updated_at' => '2023-06-15 05:53:02',
            ),
            1 => 
            array (
                'id' => 2,
                'service' => 'Lyft',
                'created_at' => '2023-06-15 05:53:02',
                'updated_at' => '2023-06-15 05:53:02',
            ),
            2 => 
            array (
                'id' => 3,
                'service' => 'Kurb',
                'created_at' => '2023-06-15 05:53:02',
                'updated_at' => '2023-06-15 05:53:02',
            ),
        ));
        
        
    }
}