<?php

namespace App\Http\Controllers\api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public $loginAfterSignup = true;

    public function __construct()
    {
        $this->middleware('jwt', ['except' => ['login']]);
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if (! $token = Auth("api")->attempt($credentials)) {
            return response()->json(['message' => 'Đăng nhập thất bại'], 401);
        }
        return $this->respondWithToken($token);
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth("api")->factory()->getTTL() * 60
        ]);
    }
    public function register(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'fullName' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ],[
            "email.email"=>"Email phải đúng định dạng",
            "email.required"=>"Email không được để trống",
            "fullName.required"=>"Tên người dùng không được để trống",
            "phone.required"=>"Số điện thoại không được để trống",
            "password.required"=>"Mật khẩu không được để trống",
        ]);

        if($validator->fails()){
            return response()->json([
                "message"=>$validator->errors(),
                "status"=> 400
            ]);

        } else{
            $user = new User();
            $user->fullName = $request->fullName;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->user_level = 2;
            $user->save();
            if($this->loginAfterSignup){
                return $this->login($request);
            }
            return response()->json([
                "user"=>$user,
                "message"=>"Đăng ký tài khoản thành công",
                "status"=> 200
            ]);
        }
    }
    public function logOut(Request $request){
        $validator = Validator::make($request->all(),[
            'token' => 'required',
        ],[
            "token.required"=>"Token không được để trống",
        ]);
        Auth("api")->logout();
            return response()->json(['message' => 'Đăng xuất thành công']);
    }
}
