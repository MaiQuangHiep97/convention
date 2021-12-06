<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'roles' => ['required'],
            'phone' => ['required','regex:/^([+]?[\s0-9]+)?(\d{3}|[(]?[0-9]+[)])?([-]?[\s]?[0-9])+$/i'],
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            // 'unique:users'=>':attribute đã tồn tại',
            // 'email'=>':attribute không đúng định dạng',
            'regex'=>':attribute không đúng định dạng',
    ];
    }
    public function attributes()
    {
        return [
            'name' => 'Username',
            'roles' => 'Role',
            'phone'=>'Phone number',
    ];
    }
}
