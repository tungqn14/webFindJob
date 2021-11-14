<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Exceptions\HttpResponseException;



class PostRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'requireJob' => 'required',
            'experience' => 'required',
            'gender' => 'required',
            'education' => 'required',
            'level' => 'required',
            'email' => 'required|email:rfc,dns',
            'numberHuman' => 'required',
            'nameCompany' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => "Tiêu đề không được để trống",
            'description.required' => "Mô tả công việc không được để trống",
            'requireJob.required' => "Yêu cầu công việc không được để trống",
            'experience.required' => "Kinh nghiệm chưa được chọn",
            'gender.required' => "Giới tính chưa được chọn",
            'education.required' => "Bằng cấp chưa được chọn",
            'level.required' => "Cấp bậc chưa được chọn",
            'numberHuman.required' => "Số người tuyển không được để trống",
            'email.required' => "Email không được để trống",
            'nameCompany.required' => "Tên công ty không được để trống",
            'email.email' => "Email phải đúng định dạng",
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(
            [
                'error' => $errors,
                'status_code' => 422,
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }


}
