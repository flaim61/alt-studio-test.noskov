<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
          'email' => 'email',
          'name' => 'required|min:2|max:50',
          'message' => 'required|min:1|max:5000',
          'contactCheck' => 'required',
        ];
    }

    public function messages(){
      return [
        'name.required' => 'Поле "Имя" - обязательно',
        'email.required' => 'Поле "Email" - обязательно',
        'messages.required' => 'Поле "Сообщение" - обязательно',
        'contactCheck.required' => 'Поле "Соглашение" - обязательно',
      ];
    }
}
