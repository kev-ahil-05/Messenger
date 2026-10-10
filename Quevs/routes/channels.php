<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast; // Siguraduhing nandito ito
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // Gagawa tayo ng public variables para ma-access ng frontend ang data
    public $username;
    public $message;

    public function __construct($username, $message)
    {
        $this->username = $username;
        $this->message = $message;
    }

    /**
     * Dito natin itatakda kung saang "channel" ipapadala ang chat.
     * Gagamit tayo ng pampublikong channel na may pangalang "chat-room".
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('chat-room'),
        ];
    }
}
