<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email',
            'fullName' => 'required',
            'wards' => 'required',
            'password' => 'required|min:6',
            'telephone' => 'required|max:11',
            'nameCompany' => 'required',
        ];
    }
    public function messages()
    {
        return [
            "email.required" =>"Email không được để trống",
            "email.email" =>"Email không đúng định dạng",
            "email.unique" =>"Email đã tồn tại",
            "wards.required" =>"Địa chỉ không được để trống",
            "password.required" =>"Mật khẩu không được để trống",
            "password.min" =>"Độ dài mật khẩu tối thiểu là 6 kí tự",
            "telephone.required" =>"Số điện thoại không được để trống",
            "telephone.max" =>"Độ dài số điện thoại tối đa là 11 số",
            "nameCompany.required" =>"Tên công ty không được để trống",
            "fullName.required" =>"Tên đầy đủ không được để trống",
        ];
    }
}
