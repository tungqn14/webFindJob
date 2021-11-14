<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
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
            'email' => "required|email|unique:users,email,$this->id,id",
            'fullName' => 'required',
            'phone' => 'required|max:11',
            'address' => 'required',

        ];
    }

    public function messages()
    {
        return [
            "email.required" =>"Email không được để trống",
            "email.email" =>"Email không đúng định dạng",
            "email.unique" =>"Email đã tồn tại",
            "wards.required" =>"Địa chỉ không được để trống",
            "phone.required" =>"Số điện thoại không được để trống",
            "phone.max" =>"Độ dài số điện thoại tối đa là 11 số",
            "fullName.required" =>"Tên đầy đủ không được để trống",
            "address.required" =>"Địa chỉ không được để trống",
        ];
    }
}
