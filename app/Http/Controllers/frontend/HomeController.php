<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Model\Blogs;
use App\Model\Career;
use App\Model\Company;
use App\Model\CvSubmit;
use App\Model\Favorite;
use App\Model\Location;
use App\Model\Posts;
use App\Model\Skill;
use App\Model\User;
use App\Model\Welfare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
class HomeController extends Controller
{
   protected $company;
   protected $post;
   protected $user;
   protected $cv;

    public function __construct(Company $company,Posts $post,User $user,CvSubmit $cv,Location $location)
    {
        $this->company = $company;
        $this->post = $post;
        $this->user = $user;
        $this->cv = $cv;
        $this->location = $location;
    }
    public function index(){
        $postHot  = $this->company->with("userPost","users","location")->where("vip",1)->get();
        $postNormal  = $this->company->with("userPost","users","location")->where("vip",0)->get();
        $blogs = Blogs::where("active",1)->paginate(4);
        return view("frontend.home.index",compact("postHot","postNormal","blogs"));
    }

    public function selectLinkLogin(){
        return view("frontend.SelectForm.selectLogin");
    }
    public function selectLinkRegister(){
        return view("frontend.SelectForm.selectRegister");
    }
    public function detail(Request $request,$id){
        $userPost = DB::table('posts')
            ->select('users.fullName','users.address',
                'users.phone','users.email','users.birthDay','users.gender',
               'users.company_id','posts.titlePost','posts.deadline','posts.typeTimePost',
                'posts.reqPost','posts.id_post','posts.tech_id',
                'posts.wage','posts.quantity','posts.desPost','posts.rankPost')
            ->join('users', function ($join) use($id) {
            $join->on('users.id', '=', 'posts.user_id')
                ->where('id_post', $id);
        });
        $listPost = DB::table('company')
            ->joinSub($userPost, 'userPost', function ($join) {
                $join->on('company.id', '=', 'userPost.company_id');
            })->first();
//
        $skills = Skill::all();
        $careers = Career::all();
        $welfares = Welfare::all();
        $id_user = ($this->post->where("id_post",$id)->get()->toArray())[0]['user_id'];
      $postOther = $this->post->whereHas("users",function ($query) use($id,$id_user){
          $query->where("id_post","!=",$id)->where("user_id",$id_user);
        })->get()->toArray();
        return view("frontend.home.detail",compact("listPost","skills","careers","welfares",'postOther'));
    }

    public function storeApplyJob(Request $request){
        $validator = Validator::make($request->all(), [
            'nameSubmit' => 'required',
            'phoneSubmit' => 'required',
            'cvSubmit' => 'required',
            'emailSubmit' => "required",
        ],[
            "nameSubmit.required"=>"Tên ứng viên không được để trống",
            "phoneSubmit.required"=>"Số điện thoại không được để trống",
            "cvSubmit.required"=>"CV ứng viên không được để trống",
            "emailSubmit.unique"=>"Email đã tồn tại vui lòng nhập email khác",
            "emailSubmit.required"=>"Email ứng viên không được để trống",
        ]);
        if (!$validator->passes()) {
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }
        $cvSubmit_Old = $request->cvSubmit_Old;
        $this->cv->cv = $cvSubmit_Old;
        if(empty($request->cvSubmit_Old)){
            if($request->hasFile('cvSubmit') ){
                $cv = $request->file('cvSubmit');
                $cvName = time().'.'.$cv->getClientOriginalExtension();
                $cv->move(public_path("frontend/file-cv/"),$cvName);
                $this->cv->cv = $cvName;
            }
        }
        $this->cv->name = $request->nameSubmit;
        $this->cv->telephone = $request->phoneSubmit;
        $this->cv->email = $request->emailSubmit;
        $this->cv->post_submit_id = $request->postId;
        $this->cv->active = 2;
        if($this->cv->save()){
            return response()->json([
                'message' => 'Gửi cv apply thành công',
                'status' => 200
            ]);
        }
        return response()->json([
            'message' => 'Gửi cv apply thất bại',
            'status' => 500
        ]);
    }


}
