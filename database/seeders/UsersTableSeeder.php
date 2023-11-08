<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('users')->delete();
        
        DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'full_name' => 'Admin',
                // 'last_name' => 'Admin',
                'avatar' => NULL,
                'password' => '$2y$10$t4MBWa25I/t/usXf/qIyNu.wQBxdYfKAFPhtFZNJvUmeTAc7eKRTm',
                'email' => 'admin@getnada.com',
                'profile_completed' => 1,
                'role' => 'admin',
                'email_verified_at' => '2023-02-21 11:13:18',
                'device_type' => 'ios',
                'is_social' => NULL,
                'is_active' => '1',
                'device_token' => NULL,
                'remember_token' => NULL,
                'created_at' => '2023-02-21 11:13:18',
                'updated_at' => '2023-02-21 11:13:18',
            ),
        ));
        
        
    }
}