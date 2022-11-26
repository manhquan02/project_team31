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
            'description' => 'required|max:10000',
            'month_package' => 'required',
            'type_package' => 'required',
            'short_description' => 'required',
            'weekday_pt' => 'required'
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
            'short_description.required' => translate('Type short description, thanks'),
            'weekday_pt.required' => translate('Type number of pt on week, thanks'),
            'type_package.required' => translate('Choose a type package, thanks'),
            'description.max' => translate('The description must not be greater than 10000 characters, thanks'),
        ];
    }
}
