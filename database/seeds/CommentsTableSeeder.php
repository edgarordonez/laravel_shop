<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        * "commentable_id" => ID del producto
        * "commentable_type" => Namespaces para asociar el ID y su relación polimorfica
        * INFO: http://www.easylaravelbook.com/blog/2015/01/21/creating-polymorphic-relations-in-laravel-5/
        */
        $data = array(
            [
                "user_id" => 1,
                "commentable_id" => "6", // ID del producto
                "commentable_type" => "App\Product", // Namespaces para asociar el ID y su relación polimorfica
                "message" => "Buena compra, estupenda relación calidad precio. Buen servicio y entrega rapida.",
				"created_at" => new DateTime,
				"updated_at" => new DateTime
            ],
            [
                "user_id" => 2,
                "commentable_id" => "5",
                "commentable_type" => "App\Product",
                "message" => "La recomiendo!",
				"created_at" => new DateTime,
				"updated_at" => new DateTime
            ],            
        );
    }
}
