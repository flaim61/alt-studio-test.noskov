<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
          'name' => 'required',
          'email' => "required|unique:users,email,$this->id,id",
          'password' => 'required|min:1|max:5000|confirmed'
        ];
    }

    public function messages(){
      return [
        'email.required' => 'Поле "Email" не заполнено',
        'password' => 'Поле Пароль не заполнено'
      ];
    }
}
