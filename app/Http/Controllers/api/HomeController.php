<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Model\Blogs;
use App\Model\Career;
use App\Model\Company;
use App\Model\CvSubmit;
use App\Model\Location;
use App\Model\Posts;
use App\Model\Skill;
use App\Model\User;
use App\Model\UserSavePost;
use App\Model\Welfare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $company;
    protected $post;
    protected $user;
    protected $cv;
    public function __construct(Company $company,Posts $post,User $user,CvSubmit $cv,Location $location)
    {
       // $this->middleware('jwt', ['except' => ['index']]);
        $this->company = $company;
        $this->post = $post;
        $this->user = $user;
        $this->cv = $cv;
        $this->location = $location;
    }
    public function index(){
        $datas  = $this->company->with("userPost","users","location")->paginate(5);
            return response()->json([
                'data'=>$datas,
                "status"=>200
            ]);

    }
    public function detailPost(Request $request,$id){
       // $dataPost  = $this->post->with("userPost","users","location")->paginate(15);
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
        $skills = Skill::all();
        $careers = Career::all();
        $welfares = Welfare::all();
        $id_user = ($this->post->where("id_post",$id)->get()->toArray())[0]['user_id'];
        $postOther = $this->post->whereHas("users",function ($query) use($id,$id_user){
            $query->where("id_post","!=",$id)->where("user_id",$id_user);
        })->get()->toArray();
        $dataDetailPost = [
            "skills"=>$skills,
            "careers"=>$careers,
            "welfares"=>$welfares,
            "listPost"=>$listPost,
            "postOther"=>$postOther,
        ];
        return response()->json([
            'data'=>$dataDetailPost,
            "status"=>200
        ]);
    }
    public function favorite(Request $request,$id){

    }
    public function detailCompany(Request $request,$id){
        $datas = $this->company->with("userPost","users","location")->find($id);
        if($datas->count()){
            return response()->json([
                'data'=>$datas,
                "status"=>200
            ]);
        }
      return  response()->json([
          'data'=>"",
          "status"=>500
      ]);

    }
    public function savePost(Request $request,$id){

    }
}
