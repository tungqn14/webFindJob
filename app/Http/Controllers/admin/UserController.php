<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index(){
        $users = $this->user->where("user_level","!=",0)->paginate(15);
        return view("admin.users.index",compact("users"));
    }
    public function delete(Request $request,$id){
        $users = $this->user->find($id);
        if($users){
            $users->delete();
            return redirect()->back()->with("messageDelete","Xóa Thành Công");
        }
        return redirect()->back()->with("messageDelete","Xóa Thất Bại");
    }
}
