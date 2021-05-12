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
            'description' => 'nullable|max:150',
            'title' => 'required|max:50|min:5',
            'path' => 'required',
            'activity_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '视频标题不能为空',
            'title.max' => '标题最多50字',
            'title.min' => '标题最少5个字',
            'description.max' => '视频描述最多150个字符',
        ];
    }
}
