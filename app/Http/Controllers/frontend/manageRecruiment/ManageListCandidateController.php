<?php

namespace App\Http\Controllers\frontend\manageRecruiment;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;

class ManageListCandidateController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index(){

    }
    public function detailProfile(Request $request,$id){
        $user = $this->user->find($id);
        if($user){
            return view("frontend.recruiments.manageCandidate.detail",compact("user"));
        }
        return view("errors.404");
    }
}
