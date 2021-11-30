<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class CompanyController extends Controller
{
    protected $company;
    public function __construct()
    {
        $this->middleware('jwt', ['except' => ['index']]);
    }
    public function index(){

    }
}
