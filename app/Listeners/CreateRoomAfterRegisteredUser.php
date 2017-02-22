<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use App\Room;

class CreateRoomAfterRegisteredUser
{

    /**
     * CreateRoomAfterRegisteredUser constructor.
     */
    public function __construct()
    {
        //
    }


    /**
     * @param Registered $registered
     */
    public function handle(Registered $registered)
    {
        Room::create([
            'room' => $registered->user->id,
            'user_id' => $registered->user->id
        ]);
    }
}
