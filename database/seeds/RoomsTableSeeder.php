<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
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
                'room' => 1,
                'user_id' => 1,
            ],
            [
                'room' => 2,
                'user_id' => 2,
            ],
            [
                'room' => 3,
                'user_id' => 3,
            ],
            [
                'room' => 4,
                'user_id' => 4,
            ]
        );

        DB::table('rooms')->insert($data);
    }
}
