<?php

namespace App\Http\Controllers\api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
class AuthController extends Controller
{
    private function getToken($email, $password)
    {
        $token = null;
        //$credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt(['email'=>$email, 'password'=>$password])) {
                return response()->json([
                    'response' => 'error',
                    'message' => 'Mật khẩu hoặc email không đúng',
                    'token'=> $token
                ]);
            }
        } catch (JWTException $e) {
            return response()->json([
                'response' => 'error',
                'message' => 'Tạo token bị lỗi',
            ]);
        }

        return $token;
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',
        ],[
            "email.required"=>"Email không được để trống",
            "password.required"=>"Mật khẩu không được để trống",
        ]);
        if($validator->fails()){
            return response()->json([
                "message"=>$validator->errors(),
                "status"=> 400
            ]);
        } else {
            $user = User::where('email', $request->email)->get()->first();
            if ($user && Hash::check($request->password, $user->password))
            {
                $response = ['success'=>true, 'data'=>['id'=>$user->id,'auth_token'=>$user->auth_token,'name'=>$user->fullName, 'email'=>$user->email,'phone'=>$user->phone,"address"=>$user->address,"desiredMoney"=>$user->desiredMoney,"avatar"=>$user->avatar,"exp"=>$user->exp,"descripYourself"=>$user->descripYourself,"position"=>$user->position,"cv"=>$user->cv,"birthDay"=>$user->birthDay]];
            }
            else{
                $response = ['success'=>false, 'data'=>'Tài khoản hoặc mật khẩu không đúng'];
            }
            return response()->json($response, 201);

        }
        return response()->json(['success'=>false, 201]);
    }

    public function register(Request $request, User $user)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|unique:users,email',
            'fullName' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ],[
            "email.email"=>"Email phải đúng định dạng",
            "email.required"=>"Email không được để trống",
            "email.unique"=>"Email đã tồn tại",
            "fullName.required"=>"Tên người dùng không được để trống",
            "phone.required"=>"Số điện thoại không được để trống",
            "password.required"=>"Mật khẩu không được để trống",
        ]);

        if($validator->fails()){
            return response()->json([
                "message"=>$validator->errors(),
                "status"=> 400
            ]);
        } else {
            $payload = [
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'fullName' => $request->name,
                'phone' => $request->phone,
                'user_level' => 2,
                'auth_token' => '',
            ];

            $user = new User($payload);
            if ($user->save()) {

                $token = self::getToken($request->email, $request->password); // generate user token

                if (!is_string($token)) return response()->json(['success' => false, 'data' => 'Lỗi khởi tạo token'], 201);

                $user = User::where('email', $request->email)->get()->first();

                $user->auth_token = $token; // update user token

                $user->save();

                $response = ['success' => true, 'data' => ['id'=>$user->id,'auth_token'=>$user->auth_token,'name'=>$user->fullName, 'email'=>$user->email,'phone'=>$user->phone,"address"=>$user->address,"desiredMoney"=>$user->desiredMoney,"avatar"=>$user->avatar,"exp"=>$user->exp,"descripYourself"=>$user->descripYourself,"position"=>$user->position,"cv"=>$user->cv,"birthDay"=>$user->birthDay]];
            } else
                $response = ['success' => false, 'data' => 'Đăng ký tài khoản bị lỗi'];
        }

        return response()->json($response, 201);
    }

    public function logOut(Request $request){
        $validator = Validator::make($request->all(),[
            'token' => 'required',
        ],[
            "token.required"=>"Token không được để trống",
        ]);
       $user = User::where("auth_token",$request->token)->get()->first();
       if($user){
           $user->auth_token = "";
           if($user->save()){
               return response()->json(['message' => 'Đăng xuất thành công',"status"=>200]);
           }
           return response()->json(['message' => 'Đăng xuất thất bại',"status"=>500]);
       }
        return response()->json(['message' => 'Đăng xuất thất bại',"status"=>500]);
    }
}
