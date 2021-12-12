<?php

namespace App\Observers;

use App\CvSubmit;
use Illuminate\Support\Facades\Log;
class CvSubmitObserver
{
    /**
     * Handle the cv submit "created" event.
     *
     * @param  \App\CvSubmit  $cvSubmit
     * @return void
     */
    public function created(CvSubmit $cvSubmit)
    {
        //
    }

    /**
     * Handle the cv submit "updated" event.
     *
     * @param  \App\CvSubmit  $cvSubmit
     * @return void
     */
    public function updated(CvSubmit $cvSubmit)
    {
        Log::info(" cái cv vua update la : ".$cvSubmit->name);
    }

    /**
     * Handle the cv submit "deleted" event.
     *
     * @param  \App\CvSubmit  $cvSubmit
     * @return void
     */
    public function deleted(CvSubmit $cvSubmit)
    {
        //
    }

    /**
     * Handle the cv submit "restored" event.
     *
     * @param  \App\CvSubmit  $cvSubmit
     * @return void
     */
    public function restored(CvSubmit $cvSubmit)
    {
        //
    }

    /**
     * Handle the cv submit "force deleted" event.
     *
     * @param  \App\CvSubmit  $cvSubmit
     * @return void
     */
    public function forceDeleted(CvSubmit $cvSubmit)
    {
        //
    }
}
