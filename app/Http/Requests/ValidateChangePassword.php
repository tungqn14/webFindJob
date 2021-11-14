<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateChangePassword extends FormRequest
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
            'passold' => 'required',
            'passnew' => 'required|confirmed',
        ];
    }

    public function messages()
    {
        return [
            "passold.required" =>"Mật khẩu cũ không được để trống",
            "passnew.required" =>"Mật khẩu mới không được để trống",
            "passnew.confirmed" =>"Mật khẩu mới không trùng với mật khẩu xác nhân",
        ];
    }

}
