<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PreReservation implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $codeOfPlace;
    public $matchId;
    public $sectorId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($codeOfPlace, $matchId, $sectorId)
    {
        $this->codeOfPlace= $codeOfPlace;
        $this->matchId= $matchId;
        $this->sectorId= $sectorId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('reservation');
    }
}
