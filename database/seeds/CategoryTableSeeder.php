<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
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
                "name" => "Carretera",
                "slug" => "carretera",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id, in, cum? Dolores deserunt quasi ipsum, consequuntur voluptas. Repudiandae vitae quis voluptas earum at repellat saepe magni unde quos. Commodi, necessitatibus!",
                "color" => "#440022"
            ],
            [
                "name" => "Muntanya",
                "slug" => "muntanya",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus hic expedita, magni aperiam numquam dolorum eaque atque optio sapiente asperiores nihil deserunt id debitis a. Vero porro ducimus illum sapiente.",
                "color" => "#445500"
            ]
        );

        DB::table('categories')->insert($data);
    }
}
