<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
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
                'message' => 'Hola buenas tengo una duda sobre un producto.',
                'room_id' => '2',
                'user_id' => '2',
            ],
            [
                'message' => 'Hola bienvenido a On Wheels, en que puedo ayudarte.',
                'room_id' => '2',
                'user_id' => '1',
            ],
            [
                'message' => 'Quería comprar la bicicleta Cube Acid 27.5" 2016 pero tengo una duda sobre mi talla. Podrias orientarme?',
                'room_id' => '2',
                'user_id' => '2',
            ],
        );

        DB::table('messages')->insert($data);
    }
}
