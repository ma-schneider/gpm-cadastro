<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'email' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
            'number' => 'required',
            //'photo' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',       
            'state' => 'required',
            'membership' => 'required', 
            'birthday' => 'required',
            'blood' => 'required',
            'healthcare' => 'required',
            'cbm' => 'required',
            'cbm_institution' => 'required',
        ];
    }
}
