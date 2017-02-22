<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessagePosted;
use Auth;
use App\Message;

class ChatController extends Controller
{
    protected $user;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $room = $this->user->id;
        return view('store.chat', compact('room'));
    }

    /**
     * @param $room
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function show($room)
    {
        return Message::with('user')->where('room_id', $room)->get();
    }

    /**
     * @param Request $request
     * @param $room
     * @return array
     */
    public function create(Request $request, $room)
    {
        $message = $this->user->messages()->create([
            'message' => $request->get('message'),
            'room_id' => $room
        ]);

        broadcast(new MessagePosted($message, $this->user, $room))->toOthers();
        return ['status' => '200'];
    }
}
