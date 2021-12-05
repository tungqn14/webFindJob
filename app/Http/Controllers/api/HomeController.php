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
    protected $savePost;
    protected $cv;
    public function __construct(Company $company,Posts $post,User $user,CvSubmit $cv,Location $location,UserSavePost $savePost)
    {

        $this->company = $company;
        $this->post = $post;
        $this->user = $user;
        $this->cv = $cv;
        $this->location = $location;
        $this->savePost = $savePost;
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
    public function savePost(Request $request){
        $user = User::where($request->token)->get()->first();
        $checkUser = $this->savePost->where('user_id',$user->id)->where('post_id',$request->idPost)->first();
        if($checkUser) {
            $checkUser->delete();
            return response()->json(["status" => 200, "code" => -1, "message" => "Hủy bài viết ra khỏi danh sách xem thành công"]);
        }else{
            $this->savePost->user_id = $request->idUser;
            $this->savePost->post_id = $request->idPost;
            if($this->savePost->save()){
                return response()->json(["status" => 200, "code" => 1, "message" => "Thêm bài viết vào danh sách lưu thành công"]);
            }
        }
        return response()->json(["status"=>500,"code"=>500,"message"=>"Lỗi server !!! Xử lý thất bại"]);

}
    public function listSavePost(Request $request){
        $arrIdPost = [];
        $user = User::where($request->token)->get()->first();
        $arrPost = $this->savePost->where("user_id",$user->id)->get()->toArray();
        foreach ($arrPost as $idPost){
            array_push($arrIdPost,$idPost['post_id']);
        }
        if($arrIdPost){
            $datas  = $this->post->with("users.company.location")->whereIn("id_post",$arrIdPost)->paginate(15);
            return response()->json(["status"=>200,"message"=>"Hiển thị danh sách bài viết đã lưu thành công","data"=>$datas]);
        }
        return response()->json(["status"=>500,"message"=>"Lỗi server !!! Hiển thị danh sách bài viết đã lưu thất bại"]);
    }
}
