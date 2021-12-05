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
                if($user->auth_token){
                  return  response()->json(['success'=>true, 'data'=>['id'=>$user->id,'auth_token'=>$user->auth_token,'fullName'=>$user->fullName, 'email'=>$user->email,'phone'=>$user->phone,"address"=>$user->address,"desiredMoney"=>$user->desiredMoney,"avatar"=>$user->avatar,"exp"=>$user->exp,"descripYourself"=>$user->descripYourself,"position"=>$user->position,"cv"=>$user->cv,"birthDay"=>$user->birthDay]]) ;
                }
                $token = self::getToken($request->email, $request->password);
                $user->auth_token = $token;
                if($user->save()){
                    return response()->json(['success' => true, 'data' => ['id'=>$user->id,'auth_token'=>$user->auth_token,'fullName'=>$user->fullName, 'email'=>$user->email,'phone'=>$user->phone,"address"=>$user->address,"desiredMoney"=>$user->desiredMoney,"avatar"=>$user->avatar,"exp"=>$user->exp,"descripYourself"=>$user->descripYourself,"position"=>$user->position,"cv"=>$user->cv,"birthDay"=>$user->birthDay]]);
                }
                return response()->json(["success"=>false,"data"=>"Đăng nhập thất bại"], 500);
            }
            else{
                return response()->json(['success'=>false, 'data'=>'Tài khoản hoặc mật khẩu không đúng']);
            }
            return response()->json(["success"=>false,"data"=>"Đăng nhập thất bại"], 500);
        }
        return response()->json(["success"=>false,"data"=>"Đăng nhập thất bại"], 500);
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
                'fullName' => $request->fullName,
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

                if($user->save()){
                    return response()->json(['success' => true, 'data' => ['id'=>$user->id,'auth_token'=>$user->auth_token,'fullName'=>$user->fullName,'email'=>$user->email,'phone'=>$user->phone,"address"=>$user->address,"desiredMoney"=>$user->desiredMoney,"avatar"=>$user->avatar,"exp"=>$user->exp,"descripYourself"=>$user->descripYourself,"position"=>$user->position,"cv"=>$user->cv,"birthDay"=>$user->birthDay]]);
                }
                return response()->json(['success' => false, 'data'=>"Token tạo ko thành công hãy quay lại đăng nhập"]);
            } else
                return response()->json(['success' => false, 'data' => 'Đăng ký tài khoản bị lỗi']);
        }
        return response()->json(['success' => false, 'data' => 'Đăng ký tài khoản thất bại']);

    }

    public function logOut(Request $request){

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
    public function updateUser(Request $request){
        $user = User::where("auth_token",$request->token)->get()->first();
        $validator = Validator::make($request->all(),[
            'fullName' => 'required',
            'birthDay' => 'required',
            'address' => 'required',
            'desiredMoney' => 'required',
            'avatar' => 'required',
            'exp' => 'required',
            'descripYourself' => 'required',
            'position' => 'required',
            'cv' => 'required',
            'phone' => 'required',
        ],[
            "fullName.required"=>"Tên đầy đủ không được để trống",
            "birthDay.required"=>"Ngày tháng năm sinh không được để trống",
            "address.required"=>"Địa chỉ không được để trống",
            "desiredMoney.required"=>"Tiền lương mong muốn không được để trống",
            "avatar.required"=>"Link ảnh không được để trống",
            "exp.required"=>"Kinh nghiệm không được để trống",
            "descripYourself.required"=>"Mô tả bản thân không được để trống",
            "position.required"=>"Vị trí hiện tại không được để trống",
            "cv.required"=>"Link CV cá nhân ko được để trống không được để trống",
            "phone.required"=>"Link CV cá nhân ko được để trống không được để trống",

        ]);
        if($validator->fails()){
            return response()->json([
                "message"=>$validator->errors(),
                "status"=> 400
            ]);
        }else{

            $user->fullName = $request->fullName;
            $user->birthDay = $request->birthDay;
            $user->address = $request->address;
            $user->desiredMoney = $request->desiredMoney;
            $user->exp = $request->exp;
            $user->position = $request->position;
            $user->descripYourself = $request->descripYourself;
            $user->phone = $request->phone;
            $user->cv = $request->cv;
            $user->avatar = $request->avatar;
            if($user->save()){
                return response()->json(['message' => 'Cập nhật thông tin thành công',"status"=>200]);
            }
            return response()->json(['message' => 'Cập nhật thông tin thât bại',"status"=>200]);
        }

        return response()->json(['message' => 'Cập nhật thông tin thất bại',"status"=>200]);
    }
}
