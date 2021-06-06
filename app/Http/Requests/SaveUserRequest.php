<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveUserRequest extends FormRequest
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
            'dni' => 'bail|required|numeric|digits:10|unique:App\Models\User,dni',
            'name' => 'bail|required',
            'lastname' => 'bail|required',
            'lastname2' => 'bail|required',
            'email' => 'bail|required|unique:App\Models\User,email',
            'status' => 'bail|nullable'
        ];
    }

    public function attributes()
    {
        return [
            'dni' => 'Cedula',
            'email' => 'Correo electrónico',
            'name' => 'Nombres',
            'lastname' => 'Apellido paterno',
            'lastname2' => 'Apellido materno',
            'status' => 'Estado',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'status' => filled($this->status),
        ]);
    }

}
