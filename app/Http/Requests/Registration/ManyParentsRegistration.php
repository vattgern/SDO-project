<?php

namespace App\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;

class ManyParentsRegistration extends FormRequest
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
            'parents' => 'array|required',
            'parents.*.name' => 'min:2|max:40|required',
            'parents.*.middle_name' => 'min:2|max:40|required',
            'parents.*.last_name' => 'min:2|max:40|required',
            'parents.*.phone' => 'min:11|max:11|required|unique:users',
            'parents.*.password' =>'min:8|required',
            'parents.*.login' => 'min:4|unique:users|required' ,
            'parents.*.students' => 'array',
            'parents.*.students.*.student_cart' => 'required|min:4|max:4'
        ];
    }
}
