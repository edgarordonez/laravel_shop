<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
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
                'name' => 'Edgar',
                'last_name' => 'Ordóñez',
                'email' => 'edgar@shop.app',
                'password' => \Hash::make('12345'),
                'type' => 'admin',
                'active' => 1,
                'address' => 'C/ Manlleu, 14, 3º, Torelló, Barcelona',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Sergi',
                'last_name' => 'Moreno',
                'email' => 'sergi@shop.app',
                'password' => \Hash::make('12345'),
                'type' => 'user',
                'active' => 1,
                'address' => 'Plaça Joanot Martorell, 20, Torelló, Barcelona',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]
        );

        DB::table('users')->insert($data);
    }
}
