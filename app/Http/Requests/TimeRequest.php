<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeRequest extends FormRequest
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
            'time_name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'time_name.required' => translate('Type time name, thanks'),
            'start_time.required' => translate('Choose start time, thanks'),
            'end_time.required' => translate('Choose end time, thanks'),
        ];

    }
}
