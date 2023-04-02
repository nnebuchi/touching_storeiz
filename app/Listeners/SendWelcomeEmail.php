<?php

namespace App\Listeners;

use App\Event\EmailVerified;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserWelcomeMail;

class SendWelcomeEmail
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
     * @param  \App\Event\EmailVerified  $event
     * @return void
     */
    public function handle(EmailVerified $event)
    {
        if($event->writer->is_writer){
            Mail::to($event->writer->email)->send(new UserWelcomeMail($event->writer));
        }
    }
}
