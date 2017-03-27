<?php

namespace App\Listeners;

use App\Events\ForumThread;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifySubscriber
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ForumThread  $event
     * @return void
     */
    public function handle(ForumThread $event)
    {
        var_dump($event->thread['name'] . " published from tinker");
    }
}
