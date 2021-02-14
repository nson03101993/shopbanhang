<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogInRequest extends FormRequest
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
            //make rules for form login
            'email' => 'bail | required | email',
            'password' => 'bail | required'
        ];
    }

    public function messages(){
        return[
            'email.required' => 'Email khong duoc bo trong',
            'email.email' => 'Dinh dang email chua dung',
            'password.required' => 'Password khong duoc bo trong'
        ];
    }
}
