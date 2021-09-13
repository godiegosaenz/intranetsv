<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SaveUserRequest extends FormRequest
{
    protected $redirect = 'admin/user/create';
    public $person_id = null;

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
            'name' => 'bail|required|alpha_dash|unique:App\Models\User,name',
            'email' => 'bail|required|unique:App\Models\User,email',
            'status' => 'bail|required',
            'password' => ['required', 'confirmed', Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()
            ->uncompromised()],
            'people_entities_id' => 'bail|required|unique:App\Models\User,people_entities_id'
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'Correo electrónico',
            'name' => 'Nombre de usuario',
            'status' => 'Estado',
            'password' => 'Contraseña',
            'people_entities_id' => 'Persona'
        ];
    }

    protected function prepareForValidation()
    {
        if($this->people_entities_id != null){
            $this->person_id = $this->people_entities_id;
            $this->redirect = url('admin/users/create/'.$this->person_id);
        }else{
            $this->redirect = url('admin/users/create');
        }

        /*$this->merge([
            'status' => filled($this->status),
        ]);*/
    }

}
