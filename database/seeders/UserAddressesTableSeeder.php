<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserAddressesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_addresses')->delete();
        
        \DB::table('user_addresses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'address_info' => 'User 1 Address',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'address_info' => 'User 2 Address',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 3,
                'address_info' => 'User 3 Address',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}