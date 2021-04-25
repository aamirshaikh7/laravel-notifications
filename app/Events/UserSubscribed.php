<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserSubscribed
{
    use Dispatchable, SerializesModels;

    public $channel;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($channel)
    {
        $this->channel = $channel;
    }
}
