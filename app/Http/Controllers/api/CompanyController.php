<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Model\Company;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class CompanyController extends Controller
{
    protected $company;
    public function __construct(Company $company)
    {
        $this->company = $company;
        //$this->middleware('jwt', ['except' => ['index']]);
    }
    public function index(){
        $datas  = $this->company->with("userPost","users","location")->paginate(15);
        return response()->json([
            'data'=>$datas,
            "status"=>200
        ]);
    }
}
