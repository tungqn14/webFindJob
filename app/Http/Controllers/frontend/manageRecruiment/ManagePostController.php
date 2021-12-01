<?php

namespace App\Http\Controllers\frontend\manageRecruiment;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Model\Career;
use App\Model\Posts;
use App\Model\Skill;
use App\Model\User;
use App\Model\Welfare;
use Illuminate\Http\Request;
use Auth;
class ManagePostController extends Controller
{
    protected $post;
    protected $skill;
    protected $user;
    public function __construct(Posts $post,Skill $skill,User $user)
    {
        $this->post = $post;
        $this->skill = $skill;
        $this->user = $user;

    }
    public function createPost(){
        $skills = $this->skill->all();
        return view("frontend.recruiments.managePost.create",compact("skills"));
    }

    public function store(StorePostRequest $request,$id){
//        $str = htmlentities($request->desPost);
//        dd(html_entity_decode($str));
            $this->post->desPost = $request->desPost;
            $this->post->reqPost = $request->reqPost;
            $this->post->typeTimePost = json_encode($request->typeTime);
            $this->post->deadline = date('d/m/Y',strtotime($request->deadline));
            $this->post->wage = $request->wage ?? "Thỏa thuận";
            $this->post->quantity = $request->quantity;
            $this->post->titlePost = $request->titlePost;
            $this->post->rankPost = json_encode($request->rank);
            $this->post->tech_id = json_encode($request->id_tech);
            $this->post->user_id = $id;
            if($this->post->save()){
                return redirect()->route("recruiment.managePost",["id"=>Auth::user()->id])->with("alertSuccessPost","Tạo bài viết thành công !");
            }
            return redirect()->route("recruiment.managePost",["id"=>Auth::user()->id])->with("alertErrorPost","Tạo bài viết thành công !");
    }

    public function edit(Request $request,$id){
       $post = $this->post->where("id_post",$id)->first();
       $skills = $this->skill->all();
        if($post){
            return view("frontend.recruiments.managePost.edit",compact("post","skills"));
        }
        return view("error.404");
    }
    public function update(StorePostRequest $request,$id){
        $post = $this->post->find($id);
        if($post){
            $post->desPost = $request->desPost;
            $post->reqPost = $request->reqPost;
            $post->typeTimePost = json_encode($request->typeTime);
            $post->deadline = date('d/m/Y',strtotime($request->deadline));
            $post->wage = $request->wage ?? "Thỏa thuận";
            $post->quantity = $request->quantity;
            $post->titlePost = $request->titlePost;
            $post->rankPost = json_encode($request->rank);
            $post->tech_id = json_encode($request->id_tech);
            $post->user_id = Auth()->user()->id;
            if($post->save()){
                return redirect()->back()->with("alertSuccessPost","Cập nhật bài viết thành công !");
            }
            return redirect()->back()->with("alertErrorPost","Cập nhật bài viết thất bại !");
        }
        abort(403);

    }
    public function delete(Request $request,$id){
        $post = $this->post->find($id);
        if($post){
           if($post->delete()){
               return redirect()->back()->with("alertSuccessPost","Xóa bài viết thành công !");
           }
            return redirect()->back()->with("alertErrorPost","Xóa bài viết thất bại !");
        }

    }
}
