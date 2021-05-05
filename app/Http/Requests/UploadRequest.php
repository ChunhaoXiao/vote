<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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
            'file' => 'required|mimes:mp4,mov,ogg,qt|max:20000',
        ];
    }

    public function messages()
    {
        return [
            'file.required' => '请选择视频文件',
            'file.mimes' => '文件格式不正确',
            'file.max' => '文件不能超过20M',
        ];
    }
}
