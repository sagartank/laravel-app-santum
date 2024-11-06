<?php

namespace App\Listeners;

use App\Events\Profilecheck;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Sendprofilechecknotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\profilecheck  $event
     * @return void
     */
    public function handle(Profilecheck $event)
    {
         $delay = now()->addSeconds(3);
          \Mail::to($event->user->email)
            ->send(new \App\Mail\ProfileCheckedMail($event->user));
        // \App\Jobs\SendProfileCheckedMailJob::dispatch($event->user)->delay($delay);
    }
}
