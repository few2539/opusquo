<?php

namespace App\CMS\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class CacheCleared
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * List of visited urls
     *
     * @var array
     */
    public $urls = [];

    /**
     * Create a new event instance.
     *
     * @param array $urls
     */
    public function __construct($urls = [])
    {
        $this->urls = $urls;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}