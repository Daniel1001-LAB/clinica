<?php

namespace App\Events;

use App\Models\Appoinment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AppoinmentStatusEvent
{

    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $appoinment;
    /**
     * Create a new event instance.
     */
    public function __construct(Appoinment $appoinment)
    {
        $this->appoinment = $appoinment;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
