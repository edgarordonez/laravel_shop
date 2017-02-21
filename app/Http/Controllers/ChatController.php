<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessagePosted;
use App\Message;

class ChatController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('store.chat');
    }

    /**
     * @return mixed
     */
    public function show()
    {
        return Message::with('user')->get();
    }

    /**
     * @param Request $request
     * @return array
     */
    public function create(Request $request)
    {
        $user = \Auth::user();
        $message = $user->messages()->create([
            'message' => $request->get('message')
        ]);

        broadcast(new MessagePosted($message, $user))->toOthers();
        return ['status' => '200'];
    }
}
