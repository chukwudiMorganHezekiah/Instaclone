<?php

namespace App\Listeners;

use App\Events\UserCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class seeNewUser
{

    public function handle(UserCreatedEvent $event)
    {
        dd($event->data);
        Mail::to($event->data->email)->send(new ContactMail($event->data));
    }
}
