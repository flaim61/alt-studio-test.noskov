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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'long' => 'required',
            'width' => 'required',
            'name' => 'required|string',
        ];
    }

    public function messages(){
      return [
        'long.required' => 'Укажите долготу',
        'width.required' => 'Укажите ширину',
        'name.required' => 'Укажите название точки',
      ];
    }
}
