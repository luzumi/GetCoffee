<?php

namespace App\Listeners;

use App\Events\RaspLoginReceivedEvent;
use App\Events\ReloadViewEvent;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Support\Facades\Broadcast;

class LoadMenuListener
{
    /**
     * Handle the event.
     *
     * @param RaspLoginReceivedEvent $event
     * @return void
     */
    public function handle(RaspLoginReceivedEvent $event)
    {
        $reloadViewEvent = new ReloadViewEvent($event->user);
        broadcast($reloadViewEvent);
        Broadcast::to("rasp_login.{$event->user}")->event(new ReloadViewEvent($event->user));

    }
}
