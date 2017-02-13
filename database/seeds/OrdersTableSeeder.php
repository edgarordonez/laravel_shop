<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                "subtotal" => 774.99,
                "shipping" => 5.75,
                "user_id" => 1,
                "created_at" => new DateTime,
                "updated_at" => new DateTime
            ],
            [
                "subtotal" => 623.99,
                "shipping" => 5.75,
                "user_id" => 2,
                "created_at" => new DateTime,
                "updated_at" => new DateTime
            ],            
            [
                "subtotal" => 774.99,
                "shipping" => 5.75,
                "user_id" => 3,
                "created_at" => new DateTime,
                "updated_at" => new DateTime
            ],
            [
                "subtotal" => 623.99,
                "shipping" => 5.75,
                "user_id" => 4,
                "created_at" => new DateTime,
                "updated_at" => new DateTime
            ]              
        );
        
        DB::table('orders')->insert($data);  
    }
}
