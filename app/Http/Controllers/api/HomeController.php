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
use Illuminate\Support\Facades\Validator;

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
    public function search(Request $request){

    }
    public function notify(Request $request){

    }
    public function detailCompany(Request $request,$id){
        $company = $this->company->with("userPost","users","location")->find($id);
        $welfare = Welfare::all();
        $techs = Skill::all();
        $carrer = Career::all();
        $datas = [
            "company"=> $company,
            "welfare"=> $welfare,
            "techs"=> $techs,
            "carrer"=> $carrer,
        ];
        if($company->count()){
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
        $user = User::where("auth_token",$request->token)->get()->first();
        $check = $this->savePost->where('user_id',$user->id)->where("post_id",$request->idPost)->delete();
        if($check) {
            return response()->json(["status" => 200, "code" => -1, "message" => "H???y b??i vi???t ra kh???i danh s??ch xem th??nh c??ng"]);
        }else{
            $this->savePost->user_id = $user->id;
            $this->savePost->post_id = $request->idPost;
            if($this->savePost->save()){
                return response()->json(["status" => 200, "code" => 1, "message" => "Th??m b??i vi???t v??o danh s??ch l??u th??nh c??ng"]);
            }
        }
        return response()->json(["status"=>500,"code"=>500,"message"=>"L???i server !!! X??? l?? th???t b???i"]);

}

    public function listSavePost(Request $request){
        $arrIdPost = [];
        $user =  $this->user->where("auth_token",$request->token)->where("user_level",2)->get()->first();
        $arrPost = $this->savePost->where("user_id",$user->id)->get()->toArray();
        foreach ($arrPost as $idPost){
            array_push($arrIdPost,$idPost['post_id']);
        }
        if($arrIdPost){
            $datas  = $this->post->with("users.company.location")->whereIn("id_post",$arrIdPost)->paginate(15);
            return response()->json(["status"=>200,"message"=>"Hi???n th??? danh s??ch b??i vi???t ???? l??u th??nh c??ng","data"=>$datas]);
        }
        return response()->json(["status"=>200,"message"=>"Danh s??ch b??i vi???t ???? l??u tr???ng","data"=>'']);
    }

    public function checkSavePost(Request $request){

        $user =  $this->user->where("auth_token",$request->token)->where("user_level",2)->get()->first();
        $check = $this->savePost->where("user_id",$user->id)->where("post_id",$request->postId)->get()->first();
        if($check){
            return response()->json(["status"=>200,"message"=>"T???n t???i","code"=>true]);
        }
        return response()->json(["status"=>200,"message"=>"Kh??ng t???n t???i","code"=>false]);
    }

    public function applyPost(Request $request){
        $validator = Validator::make($request->all(), [
            'nameSubmit' => 'required',
            'phoneSubmit' => 'required',
            'cvSubmit' => 'required',
            'emailSubmit' => "required",
        ],[
            "nameSubmit.required"=>"T??n ???ng vi??n kh??ng ???????c ????? tr???ng",
            "phoneSubmit.required"=>"S??? ??i???n tho???i kh??ng ???????c ????? tr???ng",
            "cvSubmit.required"=>"CV ???ng vi??n kh??ng ???????c ????? tr???ng",
            "emailSubmit.required"=>"Email ???ng vi??n kh??ng ???????c ????? tr???ng",
        ]);
        if($validator->fails()){
            return response()->json([
                "message"=>$validator->errors(),
                "status"=> 400
            ]);
        }
        $this->cv->cv = $request->cvSubmit;
        $this->cv->name = $request->nameSubmit;
        $this->cv->telephone = $request->phoneSubmit;
        $this->cv->email = $request->emailSubmit;
        $this->cv->post_submit_id = $request->postId;
        $this->cv->active = 2;
        if($this->cv->save()){
            return response()->json([
                'message' => 'G???i cv ???ng tuy???n th??nh c??ng',
                'status' => 200
            ]);
        }
        return response()->json([
            'message' => 'G???i cv ???ng tuy???n th???t b???i',
            'status' => 500
        ]);
    }

    public function getNotification(Request $request){
        $arrNoti = [];
        $user =  $this->user->where("auth_token",$request->token)->where("user_level",2)->get()->first();
        if($user->notifications->count() > 0){
            foreach ($user->notifications as $notification){
                array_push($arrNoti,$notification->data["message"]);
            }
            if($arrNoti){
                return response()->json([
                    'data' => $arrNoti,
                    'message' => "L???y th??ng b??o th??nh c??ng",
                    'status' => 200
                ]);
            }
            return response()->json([
                'data' => $arrNoti,
                'message' => "Kh??ng c?? th??ng b??o ????? hi???n th???",
                'status' => 200
            ]);
        }

        return response()->json([
            'data' =>'',
            'message' => "Kh??ng c?? th??ng b??o ????? hi???n th???",
            'status' => 200
        ]);

    }

}
