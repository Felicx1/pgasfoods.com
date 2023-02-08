<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NotifierEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;

    public $is_instant;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(object $data = null, bool $is_instant = false)
    {
        $this->data = $data;
        $this->is_instant = $is_instant;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
