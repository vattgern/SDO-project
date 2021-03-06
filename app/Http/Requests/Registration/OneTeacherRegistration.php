<?php

namespace App\Http\Requests\Registration;

use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class OneTeacherRegistration extends ApiRequest
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
            'name'=>'min:1|max:30|required',
            'login' => 'required|unique:users',
            'middle_name'=>'min:1|max:30|required',
            'last_name'=>'min:1|max:30|required',
            'password' => 'min:8|required',
            'phone' => 'min:11|max:11|required|unique:users',
            'lessons' => 'required|array'
        ];
    }
}
