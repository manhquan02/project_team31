<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            'package_name' => 'required',
            'subject_id' => 'required',
            'price' => 'required',
            'description' =>'required|max:10000',
            'month_package' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'package_name.required' => translate('Type package name, thanks'),
            'subject_id.required' => translate('Choose a subject, thanks'),
            'price.required' => translate('Type package price, thanks'),
            'month_package.required' => translate('Choose number of months, thanks'),
            'description.required' => translate('Type description, thanks'),
            'description.max' => translate('The description must not be greater than 10000 characters, thanks'),

        ];

    }
}
