<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nis' => 'unique:students,nis|max:10|required',
            'name' => 'required',
            'gender' => 'required',
            'class_id' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'class_id' => 'class'
        ];
    }

    public function messages()
    {
        return [
            'nis.required' => 'NIS wajib di isi',
            'nis.max' => 'maximal NIS :max carakter'
        ];
    }
}
