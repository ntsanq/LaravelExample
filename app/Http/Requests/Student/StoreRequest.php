<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>[
                'required',
                'string'
            ],
            'dob'=>[
                'required',
                'date'
            ],
            'gender'=>[
                'required'
            ],
        ];
    }

    public function messages()
    {
        return  [
            'required' => 'Điền :attribute dô đi trời',
        ];
    }

    public function attributes()
    {
        return  [
            'name' => 'tên',
            'dob' => 'ngày sinh',
            'gender' => 'giới tính',
        ];
    }
}
