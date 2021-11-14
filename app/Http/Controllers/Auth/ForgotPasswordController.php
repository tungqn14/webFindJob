<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view("login.forgot");
    }
    public function broker()
    {
        return Password::broker('users');
    }


    public function sendResetLinkEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ], [
            'email.required' => "Email không được để trống",
            'email.email' => "Email phải đúng định dạng",
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $email = User::where("email", $request->email)->first();
        if (isset($email)) {
           $status = Password::sendResetLink(
               $request->only('email')
           );

           if ($status == Password::RESET_LINK_SENT){
               return back()->with('messageSuccess', 'Chúng tôi đã gửi link reset mật khẩu đến mail,hãy kiểm tra mail');
           }
            return back()->with('message', 'Gửi link reset mật khẩu thất bại !!!');
        }
        return redirect()->back()->with("message", "Email chưa tồn tại, vui lòng nhập email khác !!!");

    }


}
