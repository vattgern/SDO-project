<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttestationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'semester' => 'required|regex:/[0-1]{1}/|max:1',
            'rate' => 'required|regex:/н{1}|[2-5]{1}/|max:1',
            'lesson' => 'required|min:2'
        ];
    }
}
