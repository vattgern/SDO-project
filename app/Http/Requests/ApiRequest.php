<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $e = $validator->errors();
        throw new HttpResponseException(
          response()->json(['message' => 'You failed validation', 'exceptions' => $e], 400)
        );
    }

    protected function failedAuthorization()
    {
        throw new HttpResponseException(
            response()->json(['message' => 'Unauthorized'], 401)
        );
    }
}
