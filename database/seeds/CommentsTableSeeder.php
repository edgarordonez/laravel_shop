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
                "commentable_id" => "6", 
                "commentable_type" => "App\Products", 
                "message" => "Buena compra, estupenda relación calidad precio. Buen servicio y entrega rapida.",
				"rating" => 5,
                "created_at" => new DateTime,
				"updated_at" => new DateTime
            ],
            [
                "user_id" => 2,
                "commentable_id" => "5",
                "commentable_type" => "App\Products",
                "message" => "La recomiendo!",
                "rating" => 2,
				"created_at" => new DateTime,
				"updated_at" => new DateTime
            ],            
        );

        DB::table('comments')->insert($data);        
    }
}
