<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Model\Career;
use App\Model\Company;
use App\Model\Skill;
use App\Model\Welfare;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class CompanyController extends Controller
{
    protected $company;
    public function __construct(Company $company)
    {
        $this->company = $company;

    }
    public function index(){
        $listCompany  = $this->company->with("userPost","users","location")->all();
        $welfare = Welfare::all();
        $techs = Skill::all();
        $carrer = Career::all();
        $datas = [
          "listCompany"=> $listCompany,
          "welfare"=> $welfare,
          "techs"=> $techs,
          "carrer"=> $carrer,
        ];
        return response()->json([
            'data'=>$datas,
            "status"=>200
        ]);
    }
}
