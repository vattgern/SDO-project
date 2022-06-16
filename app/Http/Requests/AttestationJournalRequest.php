<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttestationJournalRequest extends ApiRequest
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
            'rate' => 'required|max:1' ,
            'lesson' => 'required|min:2',
            'students' => 'required|array',
            'students.*.id_student' => 'required|regex:/[0-9]/'
        ];
    }
}
