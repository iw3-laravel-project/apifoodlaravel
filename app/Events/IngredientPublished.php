<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class IngredientPublished implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $tmpingredient;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($tmpingredient)
    {
        $this->tmpingredient = $tmpingredient;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn() {
        return new Channel('ingredients');
      }
    
      public function broadcastWith() {
        return [
            'title' => $this->tmpingredient->title,
          ];
    }
}
