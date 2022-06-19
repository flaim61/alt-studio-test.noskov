<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PointRequest extends FormRequest
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
          'long' => "required|numeric",
          'width' => 'required|numeric'
        ];
    }

    public function messages(){
      return [
        'long.required' => 'Укажите долготу',
        'width.required' => 'Укажите ширину',
        'long.numeric' => 'Вы ввели некорректную долготу',
        'width.numeric' => 'Вы ввели некорретную ширину'
      ];
    }
}
