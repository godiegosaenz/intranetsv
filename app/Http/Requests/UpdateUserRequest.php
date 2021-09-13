<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

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
            'name' => ['bail',
                        'required',
                        Rule::unique('users')->ignore($this->route('user'))],
            'email' => ['bail',
                        'required',
                        Rule::unique('users')->ignore($this->route('user'))],
            'password' => ['required', 'confirmed', Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()
            ->uncompromised()],
            'status' => 'bail|required',
            'people_entities_id' => ['bail',
                        'required',
                        Rule::unique('users')->ignore($this->route('user'))],
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'Correo electrónico',
            'name' => 'Nombres',
            'password' => 'Contraseña',
            'status' => 'Estado',
            'people_entities_id' => 'Persona/empresa',
        ];
    }

    protected function prepareForValidation()
    {
        /*$this->merge([
            'status' => filled($this->status),
        ]);*/
    }
}
