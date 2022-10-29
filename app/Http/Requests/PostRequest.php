<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'content_post' => 'required|max:10000',
            'subject_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => translate('Type post title, thanks'),
            'content_post.required' => translate('Type content post, thanks'),
            'content_post.max' => translate('The content must not be greater than 10000 characters, thanks'),
            'subject_id.required' => translate('Choose a subject, thanks'),
        ];

    }
}
