<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoStoreRequest extends FormRequest
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
            'description' => 'required|max:100',
            'path' => 'required',
            'activity_id' => 'required',
        ];
    }

    public function messages() {
        return [
            'description.required' => '视频描述不能为空',
            'description.max' => '视频描述最多100个字符',
        ];
    }
}
