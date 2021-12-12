<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Model\Career;
use App\Model\Company;
use App\Model\CvSubmit;
use App\Model\Location;
use App\Model\Posts;
use App\Model\User;
use App\Model\Welfare;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class RecruimentController extends Controller
{
    protected $user;
    protected $company;
    protected $post;
    protected $welfare;
    protected $career;
    protected $location;
    protected $listCv;

    public function __construct(User $user,Company $company,Posts $post,Welfare $welfare,Career $career,Location $location,CvSubmit $listCv)
    {
        $this->user = $user;
        $this->company = $company;
        $this->post = $post;
        $this->welfare = $welfare;
        $this->career = $career;
        $this->location = $location;
        $this->listCv = $listCv;

    }
    public function index(Request $request,$idUser){
        $user = $this->user->find($idUser);
        $welfares =$this->welfare->all();
        $careers = $this->career->all();
        $company = $user->company->toArray();
      if($user){
           return view("frontend.recruiments.home",compact("company","user","welfares","careers"));
        }
       return view("errors.404");
    }

    public function managePost(Request $request,$id){
        $posts = $this->post->where("user_id","=",$id)->get();
        $user = Auth()->user();
        $checkVip = $this->company->with("users")->withCount("userPost")->whereHas("users",function ($query){
            $query->where("id",Auth::user()->id);
        })->get();
       //dd($checkVip[0]->vip);
        if($posts){
            return view("frontend.recruiments.managePost.index",compact("posts","user","checkVip"));
        }
       abort(403);
    }

    public function manageAccount(Request $request,$idUser){

        $locations = $this->location->all();
        $welfares =$this->welfare->all();
        $careers = $this->career->all();
        $employer = $this->user->with("company")->where("id","=",$idUser)->get();
        return view("frontend.recruiments.manageAccount.index",compact("careers","locations","employer",'welfares'));
    }

    public function listCandidate(Request $request){
       if($request->txtSearch){
           $candidates = $this->user->where("user_level","=",2)->where(function($query) use ($request){
               $query->where('fullName','like',"%".$request->txtSearch."%")
                   ->orWhere('position','like',"%".$request->txtSearch."%")
                   ->orWhere('desiredMoney','like',"%".$request->txtSearch."%");
           })->paginate(10);
       }else{
           $candidates = $this->user->where("user_level","=",2)->paginate(10);
       }
        return view("frontend.recruiments.manageCandidate.index",compact('candidates'));
    }

    public function listCVSubmit(Request $request){
        $idAuth = Auth::user()->id;
        $listCV = $this->listCv->with("post")->whereHas("post",function ($query) use($idAuth){
            $query->where("user_id","=",$idAuth);
        })->paginate(10);
        return view("frontend.recruiments.manageCvSubmit.index",compact('listCV'));
    }

    public function deleteCVSubmit(Request $request,$id){
        $cv = $this->listCv->find($id);
        if($cv){
            if($cv->delete()){
                return redirect()->back()->with("messDeleteCvSubmit","Xóa thành công");
            }
            return redirect()->back()->with("messDeleteFailCvSubmit","Xóa thất bại");
        }
        return redirect()->back()->with("messDeleteFailCvSubmit","Xóa thất bại");
    }

}
