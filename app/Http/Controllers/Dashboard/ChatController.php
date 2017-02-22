<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;

class ChatController extends Controller
{
    public function index()
    {
        $rooms = Room::join('users', 'rooms.id', '=', 'users.id')->where('type', '!=', 'admin')->get();
        return view('dashboard.chat.index', compact('rooms'));
    }

    public function room($room_id = null)
    {
        $room = Room::where('room', $room_id)->firstOrFail()->room;
        return view('store.chat', compact('room'));
    }
}
