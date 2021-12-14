<?php

namespace App\Observers;

use App\Model\CvSubmit;
use App\Model\Posts;
use App\Model\User;
use App\Notifications\AcceptCvSubmitNotification;
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
        $userUpdate = User::where("email",$cvSubmit->email)->first();
       $post = Posts::where("id_post",$cvSubmit->post_submit_id)->first();
       $data = [
         "titlePost"=>$post->titlePost,
//           "emailUser"=>$userUpdate->email,
//           "fullNamelUser"=>$userUpdate->fullName,
//           "auth_token"=>$userUpdate->auth_token,
           "active"=>$cvSubmit->active,

       ];
        if($cvSubmit->isDirty("active")){
            $userUpdate->notify(new AcceptCvSubmitNotification($data));
        }

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
