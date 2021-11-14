<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'titleBlog' => 'required',
            'desBlog' => 'required',
            'contentBlog' => 'required',
            'theme' => 'required|image',
        ];
    }
    public function messages()
    {
        return [
            "titleBlog.required" =>"Tiêu đề bài viết không được để trống",
            "desBlog.required" =>"Mô tả bài viết không được để trống",
            "contentBlog.required" =>"Nội dung bài viết không được để trống",
            "theme.required" =>"File ảnh không được để trống",
            "theme.image" =>"Chỉ cho upload file ảnh",
        ];
    }
}
