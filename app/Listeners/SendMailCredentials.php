<?php

namespace App\Listeners;

use App\Events\UserWasCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginCrendencialsMail;

class SendMailCredentials
{
    /**
     * Handle the event.
     *
     * @param  UserWasCreated  $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        Mail::to($event->user)->queue(
            new LoginCrendencialsMail($event->user,$event->password)
        );
    }
}
