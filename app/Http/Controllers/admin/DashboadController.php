<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Company;
use App\Model\Posts;
use App\Model\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboadController extends Controller
{
    protected $user;
    protected $post;
    protected $company;
    public function __construct(User $user,Posts $post,Company $company)
    {
        $this->user = $user;
        $this->post = $post;
        $this->company = $company;
    }

    public function index(){
      $countCandidate = $this->user->where("user_level",2)->count();
      $countRecruiment = $this->user->where("user_level",1)->count();
      $countPost = $this->post->count();
      $countCompany = $this->company->count();

      $chartPost = Posts::select("id_post","created_at")->orderBy("created_at","asc")->get()->groupBy(function ($data){
         return Carbon::parse($data->created_at)->format("n");
      });
        $chartUser = User::select("id","user_level","created_at")->where("user_level","<>",0)->orderBy("created_at","asc")->get()->groupBy(function ($data){
            return Carbon::parse($data->created_at)->format("n");
        });
//dd($chartPost);
        $monthPost = [];
        $monthCountPost = [];
        $monthUser = [];
        $monthCountUser = [];

        foreach ($chartPost as $month=>$value){
            $monthPost[] = "Tháng ".$month;
            $monthCountPost[] = count($value);
        }
        foreach ($chartUser as $month=>$value){
            $monthUser[] = "Tháng ".$month;
            $monthCountUser[] = count($value);
        }
      $data = [
          "countCandidate"=>$countCandidate,
          "countRecruiment"=>$countRecruiment,
          "countPost"=>$countPost,
          "countCompany"=>$countCompany,
      ];
      return view("admin.home.index",compact("data","monthPost","monthCountPost","monthUser","monthCountUser"));
  }

}
