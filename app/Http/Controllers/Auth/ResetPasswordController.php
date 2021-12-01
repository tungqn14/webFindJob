<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\PasswordReset;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    public function broker()
    {
        return Password::broker('');
    }
    public function guard()
    {
        return Auth::guard("web");
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('login.reset',compact('token'));
    }

    public function reset(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required',
        ],[
            'email.required'=>"Email không được để trống",
            'email.email'=>"Email phải đúng định dạng gmail",
            'password.required'=>"Mật khẩu mới không được để trống",
            'password.min'=>"Độ dài mật khẩu mới nhỏ nhất là 3 ký tự",
            'password.confirmed'=>"Mật khẩu xác thực không đúng",
            'password_confirmation.required'=>"Mật khẩu xác thực không được để trống",
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $status = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
            $this->resetPassword($user, $password);
        }
);

        if($status == Password::PASSWORD_RESET){
        return redirect()->back()->with('messageSuccess', 'Đổi Mật khẩu Thành Công');
     }
        return redirect()->back()->with('message', 'Đổi Mật khẩu Thất Bại');

    }

}


