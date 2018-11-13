<?php

namespace App\HunterGuide\Users\Requests;

use App\HunterGuide\Helpers\Enum\EnumResponse;
use App\HunterGuide\Helpers\Facades\Util;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UsersLogin extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'userName' => 'required|max:60',
            'password' => 'required'
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(Util::apiResponse(false,
            "inputs dont valid!", null, $validator->errors(), EnumResponse::RESPONSE_BAD_REQUEST));
    }
}
