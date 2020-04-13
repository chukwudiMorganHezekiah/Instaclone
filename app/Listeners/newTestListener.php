<?php

namespace App\Listeners;

use App\Events\newTestEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\testMail;


class newTestListener implements ShouldQueue
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
     * @param  newTestEvent  $event
     * @return void
     */
    public function handle(newTestEvent $event)
    {
        //

        sleep(10);
    }
}
