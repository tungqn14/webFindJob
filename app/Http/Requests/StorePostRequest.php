<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'titlePost' => 'required',
            'desPost' => 'required',
            'reqPost' => 'required',
            'deadline' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "titlePost.required" =>"Tiêu đề bài viết không được để trống",
            "desPost.required" =>"Mô tả bài viết không được để trống",
            "reqPost.required" =>"Yêu cầu bài viết không được để trống",
            "deadline.required" =>"Ngày hạn chót không được để trống",
        ];
    }
}
