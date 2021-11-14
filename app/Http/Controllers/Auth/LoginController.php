<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//       $this->middleware('guest')->except('logout');
    }
    public function registerAdd(){
        \DB::table('users')->insert([
            'fullName' => "Administrator",
            'email' => "toro.freetime@gmail.com",
            'password' => Hash::make('123'),
            'phone' => "032154687",
            'user_level'=> 0
        ]);
    }
    public function index(){
        return view("login.login");
    }

    public function handleLogin(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:2',
        ],[
            "email.required"=>"Email không được để trống",
            "password
            .required"=>"Mật khẩu không được để trống",
            "email.email"=>"Email phải đúng định dạng",
            "password.min"=>"Độ dài mật khẩu nhỏ nhất là 6 ký tự",
        ]);

        if ($validator->fails()) {
            return redirect()->route("login.index")
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt($request->only('email','password'),$request->rememberMe)) {
            return redirect()->route('dashboad.index');
        }
        return redirect()->back()->with("message","Email hoặc mật khẩu không đúng !!!");
    }
    public function logOut(){
        Auth::logout();
        return redirect()->route("login.index");
    }

}
