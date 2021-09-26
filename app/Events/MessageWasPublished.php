<?php

namespace App\Events;

use App\Models\Topic;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageWasPublished implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $topic, $data;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data, Topic $topic)
    {
        $this->data = $data;
        $this->topic = $topic;
    }

    public function broadcastAs()
    {
        return 'MessageWasPublished';
    }

    public function broadcastWith()
    {
        return [
            'topic' => $this->topic->title,
            'data' => $this->data,
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return $this->topic->subscribers->map(function($user)  {
            return new PrivateChannel('timeline.'. $user->id);
        })
            ->toArray();
    }
}
