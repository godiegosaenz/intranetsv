<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Cookie;

class StorePersonEntityRequest extends FormRequest
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
            'cc_ruc' => 'bail|required|numeric|digits:10|digits_between:10,13|unique:App\Models\PersonEntity,cc_ruc',
            'name' => 'bail|required',
            'last_name' => 'bail|required',
            'maternal_last_name' => 'bail|required',
            'status' => 'bail|required',
            //'is_person' => 'bail|required',
            'date_birth' => 'bail|required',
            'address' => 'bail|required',
            //'legal_representative' => 'bail|required',
            'type' => 'bail|required',
            'number_phone1' => 'bail|required',
            'email' => 'bail|required|unique:App\Models\User,email',
            'country_id' => 'bail|required',
            'province_id' => 'bail|required',
            'canton_id' => 'bail|required',
            'parish_id' => 'bail|required',
        ];
    }

    public function attributes()
    {
        return [
            'cc_ruc' => 'Cedula/Ruc',
            'name' => 'Nombres/Nombre Comercial',
            'last_name' => 'Apellido paterno/ Razon Social',
            'maternal_last_name' => 'Apellido Paterno',
            'status' => 'Estado',
            //'is_person' => 'Es persona',
            'date_birth' => 'Fecha de nacimiento',
            'address' => 'Direccion',
            //'legal_representative' => 'Representante Legal',
            'type' => 'Tipo',
            'number_phone1' => 'Numero de telefono',
            'email' => 'Correo electronico',
            'country_id' => 'Pais',
            'province_id' => 'Provincia',
            'canton_id' => 'Canton',
            'parish_id' => 'Parroquia',
        ];
    }

    protected function prepareForValidation()
    {
        Cookie::queue('country_id', $this->country_id);
        Cookie::queue('province_id', $this->province_id);
        Cookie::queue('canton_id', $this->canton_id);
        Cookie::queue('parish_id', $this->parish_id);
    }
}
