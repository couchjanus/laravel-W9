<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Captcha;

class ContactFormRequest extends FormRequest
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
          'email' => 'required|string|email|max:255|unique:users',
          'message' => 'required|string|min:10|max:2000',
          'g-recaptcha-response' => new Captcha()
        ];
    }
}
