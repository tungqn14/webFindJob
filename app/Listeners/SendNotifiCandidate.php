<?php

namespace App\Listeners;

use App\Events\CvSubmitEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotifiCandidate
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
     * @param  CvSubmitEvent  $event
     * @return void
     */
    public function handle(CvSubmitEvent $event)
    {
        //
    }
}
