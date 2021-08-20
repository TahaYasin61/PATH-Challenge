<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'product_name' => 'Example Product 1',
                'product_price' => '10',
                'product_description' => 'Example Product 1 Description',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'product_name' => 'Example Product 2',
                'product_price' => '20',
                'product_description' => 'Example Product 2 Description',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'product_name' => 'Example Product 3',
                'product_price' => '30',
                'product_description' => 'Example Product 3 Description',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}