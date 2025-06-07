<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $conversationId;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($conversationId, $message)
    {
        $this->conversationId = $conversationId;
        $this->message = $message;
    }

    public function broadcastWith()
    {
        return [
            'message' => $this->message->message,
            'sender_id' => $this->message->sender_id,
            'timestamp' => $this->message->created_at->format('h:i A'),
        ];
    }

    public function broadcastOn()
    {
        return new Channel('conversation.' . $this->conversationId);
    }

    public function broadcastAs()
    {
        return 'message.sent';
    }
}
