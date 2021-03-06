<?php

use Illuminate\Database\Seeder;

class OrderItemsTableSeeder extends Seeder
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
                "quantity" => 1,
                "price" => 774.99,
                "product_id" => 5,
                "order_id" => 1
            ],
            [
                "quantity" => 1,
                "price" => 623.99,
                "product_id" => 6,
                "order_id" => 2
            ],
            [
                "quantity" => 1,
                "price" => 774.99,
                "product_id" => 5,
                "order_id" => 1
            ],
            [
                "quantity" => 1,
                "price" => 623.99,
                "product_id" => 6,
                "order_id" => 2
            ]
        );

        DB::table('order_items')->insert($data);
    }
}
