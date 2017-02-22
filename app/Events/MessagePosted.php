<?php

namespace App\Events;

use App\Message;
use App\User;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessagePosted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    public $user;

    public $room;

    /**
     * MessagePosted constructor.
     * @param Message $message
     * @param User $user
     * @param Number $room
     */
    public function __construct(Message $message, User $user, $room)
    {
        $this->message = $message;
        $this->user = $user;
        $this->room = $room;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chatroom.'. $this->room);
    }
}
