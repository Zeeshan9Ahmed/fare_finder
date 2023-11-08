<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('states')->delete();
        
        \DB::table('states')->insert(array (
            0 => 
            array (
                'id' => 1,
                'state_name' => 'Alabama',
                'abbreviation' => 'AL',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            1 => 
            array (
                'id' => 2,
                'state_name' => 'Alaska',
                'abbreviation' => 'AK',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            2 => 
            array (
                'id' => 3,
                'state_name' => 'Arizona',
                'abbreviation' => 'AZ',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            3 => 
            array (
                'id' => 4,
                'state_name' => 'Arkansas',
                'abbreviation' => 'AR',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            4 => 
            array (
                'id' => 5,
                'state_name' => 'California',
                'abbreviation' => 'CA',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            5 => 
            array (
                'id' => 6,
                'state_name' => 'Colorado',
                'abbreviation' => 'CO',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            6 => 
            array (
                'id' => 7,
                'state_name' => 'Connecticut',
                'abbreviation' => 'CT',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            7 => 
            array (
                'id' => 8,
                'state_name' => 'Delaware',
                'abbreviation' => 'DE',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            8 => 
            array (
                'id' => 9,
                'state_name' => 'District of Columbia',
                'abbreviation' => 'DC',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            9 => 
            array (
                'id' => 10,
                'state_name' => 'Florida',
                'abbreviation' => 'FL',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            10 => 
            array (
                'id' => 11,
                'state_name' => 'Georgia',
                'abbreviation' => 'GA',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            11 => 
            array (
                'id' => 12,
                'state_name' => 'Hawaii',
                'abbreviation' => 'HI',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            12 => 
            array (
                'id' => 13,
                'state_name' => 'Idaho',
                'abbreviation' => 'ID',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            13 => 
            array (
                'id' => 14,
                'state_name' => 'Illinois',
                'abbreviation' => 'IL',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            14 => 
            array (
                'id' => 15,
                'state_name' => 'Indiana',
                'abbreviation' => 'IN',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            15 => 
            array (
                'id' => 16,
                'state_name' => 'Iowa',
                'abbreviation' => 'IA',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            16 => 
            array (
                'id' => 17,
                'state_name' => 'Kansas',
                'abbreviation' => 'KS',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            17 => 
            array (
                'id' => 18,
                'state_name' => 'Kentucky',
                'abbreviation' => 'KY',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            18 => 
            array (
                'id' => 19,
                'state_name' => 'Louisiana',
                'abbreviation' => 'LA',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            19 => 
            array (
                'id' => 20,
                'state_name' => 'Maine',
                'abbreviation' => 'ME',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            20 => 
            array (
                'id' => 21,
                'state_name' => 'Maryland',
                'abbreviation' => 'MD',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            21 => 
            array (
                'id' => 22,
                'state_name' => 'Massachusetts',
                'abbreviation' => 'MA',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            22 => 
            array (
                'id' => 23,
                'state_name' => 'Michigan',
                'abbreviation' => 'MI',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            23 => 
            array (
                'id' => 24,
                'state_name' => 'Minnesota',
                'abbreviation' => 'MN',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            24 => 
            array (
                'id' => 25,
                'state_name' => 'Mississippi',
                'abbreviation' => 'MS',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            25 => 
            array (
                'id' => 26,
                'state_name' => 'Missouri',
                'abbreviation' => 'MO',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            26 => 
            array (
                'id' => 27,
                'state_name' => 'Montana',
                'abbreviation' => 'MT',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            27 => 
            array (
                'id' => 28,
                'state_name' => 'Nebraska',
                'abbreviation' => 'NE',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            28 => 
            array (
                'id' => 29,
                'state_name' => 'Nevada',
                'abbreviation' => 'NV',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            29 => 
            array (
                'id' => 30,
                'state_name' => 'New Hampshire',
                'abbreviation' => 'NH',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            30 => 
            array (
                'id' => 31,
                'state_name' => 'New Jersey',
                'abbreviation' => 'NJ',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            31 => 
            array (
                'id' => 32,
                'state_name' => 'New Mexico',
                'abbreviation' => 'NM',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            32 => 
            array (
                'id' => 33,
                'state_name' => 'New York',
                'abbreviation' => 'NY',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            33 => 
            array (
                'id' => 34,
                'state_name' => 'North Carolina',
                'abbreviation' => 'NC',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            34 => 
            array (
                'id' => 35,
                'state_name' => 'North Dakota',
                'abbreviation' => 'ND',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            35 => 
            array (
                'id' => 36,
                'state_name' => 'Ohio',
                'abbreviation' => 'OH',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            36 => 
            array (
                'id' => 37,
                'state_name' => 'Oklahoma',
                'abbreviation' => 'OK',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            37 => 
            array (
                'id' => 38,
                'state_name' => 'Oregon',
                'abbreviation' => 'OR',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            38 => 
            array (
                'id' => 39,
                'state_name' => 'Pennsylvania',
                'abbreviation' => 'PA',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            39 => 
            array (
                'id' => 40,
                'state_name' => 'Rhode Island',
                'abbreviation' => 'RI',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            40 => 
            array (
                'id' => 41,
                'state_name' => 'South Carolina',
                'abbreviation' => 'SC',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            41 => 
            array (
                'id' => 42,
                'state_name' => 'South Dakota',
                'abbreviation' => 'SD',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            42 => 
            array (
                'id' => 43,
                'state_name' => 'Tennessee',
                'abbreviation' => 'TN',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            43 => 
            array (
                'id' => 44,
                'state_name' => 'Texas',
                'abbreviation' => 'TX',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            44 => 
            array (
                'id' => 45,
                'state_name' => 'Utah',
                'abbreviation' => 'UT',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            45 => 
            array (
                'id' => 46,
                'state_name' => 'Vermont',
                'abbreviation' => 'VT',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            46 => 
            array (
                'id' => 47,
                'state_name' => 'Virginia',
                'abbreviation' => 'VA',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            47 => 
            array (
                'id' => 48,
                'state_name' => 'Washington',
                'abbreviation' => 'WA',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            48 => 
            array (
                'id' => 49,
                'state_name' => 'Wisconsin',
                'abbreviation' => 'WI',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
            49 => 
            array (
                'id' => 50,
                'state_name' => 'Wyoming',
                'abbreviation' => 'WY',
                'created_at' => '2023-07-07 17:30:50',
                'updated_at' => '2023-07-07 17:30:50',
            ),
        ));
        
        
    }
}