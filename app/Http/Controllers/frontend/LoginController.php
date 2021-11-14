<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
class LoginController extends Controller
{
    public function index(){
        return view("frontend.home.index");
    }
    public function formLogin(){
        return view("frontend.UiForm.formLogin");
    }

    public function checkLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ],[
            "email.required" =>"Email không được để trống",
            "email.email" =>"Email không đúng định dạng",
            "password.required" =>"Mật khẩu không được để trống",
            "password.min" =>"Độ dài mật khẩu tối thiểu là 6 kí tự",
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if (Auth::attempt($request->only('email','password'),$request->rememberMe)) {
            return redirect()->route('home.index');
        }
        return redirect()->back()->with("message","Email hoặc mật khẩu không đúng !!!");
    }
    public function logOut(){
        Auth::logout();
        return redirect()->route("home.index")->with("messageLogoutAccountSuccess","Đăng xuất tài khoản thành công !!!");
    }

}
