<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
            'subject_name' => 'required',
            'description' => 'required|max:10000',
        ];
    }

    public function messages()
    {
        return [
            'subject_name.required' => translate('Type subject name, thanks'),
            'description.required' => translate('Type description, thanks'),
            'description.max' => translate('The description must not be greater than 10000 characters, thanks'),
        ];

    }
}
