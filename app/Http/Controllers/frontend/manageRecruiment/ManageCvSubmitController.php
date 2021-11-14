<?php

namespace App\Http\Controllers\frontend\manageRecruiment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ManageCvSubmitController extends Controller
{
    public function index(Request $request){
       return view("frontend.recruiments.manageSubmit.index");

    }
}
