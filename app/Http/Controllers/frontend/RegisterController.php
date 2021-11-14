<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Model\Company;
use App\Model\Location;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
class RegisterController extends Controller
{
    protected $user;
    protected $location;

    public function __construct(User $user,Location $location)
    {
        $this->user = $user;
        $this->location = $location;
    }

    public function formRecruiment(){
        $locations =  $this->location->all();
        return view("frontend.UiForm.formRegisterRecruiment",compact('locations'));
    }

    public function formCandidate(){
        return view("frontend.UiForm.formRegisterCandidate");
    }

    public function storeRecruiment(RegisterRequest $request){
        try {

            DB::beginTransaction();
          $idCompany =   DB::table('company')->insertGetId(
                [
                    'nameCompany' => $request->nameCompany,
                    'officeAddress' => $request->city,
                    'website' => $request->site ?? "null",
                    'aboutCompany' => "cập nhật ngay...",
                ]
            );
                 $this->user->fullName = $request->fullName;
                $this->user->password= Hash::make($request->password);
               $this->user->email= $request->email;
                $this->user->phone= $request->telephone;
                $this->user->address=$request->wards;
                $this->user->user_level= 1;
                $this->user->company_id= (int)$idCompany;
            if($this->user->save()){
                DB::commit();
                return redirect()->route("login.formLogin")->with("messageRegisterAccountSuccess","Đăng ký tài khoản thành công công !!!");
            }
           return redirect()->back()->with("messageRegisterAccountError","Lỗi hệ thống đăng Ký tài khoản thất bại !!!");

        }catch (\Exception $exception){
            DB::rollBack();
            Log::error($exception->getMessage()."-- line : ".$exception->getLine());
            return redirect()->back()->with("messageRegisterAccountError","Đăng ký tài khoản  thất bại !!!");
        }

    }

    public function storeCandidate(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email|email',
            'fullName' => 'required',
            'password' => 'required|min:6',
            'telephone' => 'required|max:11',
        ],[
            "email.required" =>"Email không được để trống",
            "email.email" =>"Email không đúng định dạng",
            "email.unique" =>"Email đã tồn tại",
            "password.required" =>"Mật khẩu không được để trống",
            "password.min" =>"Độ dài mật khẩu tối thiểu là 6 kí tự",
            "telephone.required" =>"Số điện thoại không được để trống",
            "telephone.max" =>"Độ dài số điện thoại tối đa là 11 số",
            "fullName.required" =>"Tên đầy đủ không được để trống",
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $user = $this->user->create([
            'fullName'=> $request->fullName,
            'password'=> Hash::make($request->password),
            'email'=> $request->email,
            'phone'=> $request->telephone,
            'user_level'=> 2,
        ]);

        if($user){
            return redirect()->route("login.formLogin")->with("messageRegisterAccountSuccess","Đăng ký tài khoản thành công công !!!");
        }
        return redirect()->back()->with("messageRegisterAccountError","Đăng ký tài khoản thất bại !!!");

    }

}
