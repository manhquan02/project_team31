<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'user_id' => 'required',
            'package_id' => 'required',
            'time_id' => 'required',
            'pt_id' =>'required',
            'weekday_name' =>'required',
            'activate_day' => 'required',
            'payment_method' =>'required',
        ];
    }

    public function messages(){
        return [
            'required'=>':attribute không được bỏ trống',

        ];

    }
}
