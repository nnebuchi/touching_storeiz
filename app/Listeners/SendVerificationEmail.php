<?php

namespace App\Listeners;

use App\Event\WriterCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserVerificationMail;

class SendVerificationEmail
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
     * @param  \App\Event\WriterCreated  $event
     * @return void
     */
    public function handle(WriterCreated $event)
    {
        Mail::to($event->writer->email)->send(new UserVerificationMail($event->writer));

    }
}
