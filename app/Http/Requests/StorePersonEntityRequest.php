<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Arr;

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
        $arrayReglasNaturales = array();
        $arrayReglasJuridicas = array();
        $reglasNatural = [
            //'cc_ruc' => 'bail|required|numeric|digits:10|unique:App\Models\PersonEntity,cc_ruc',
            'name' => 'bail|required|max:250',
            'last_name' => 'bail|required|max:250',
            'maternal_last_name' => 'bail|required|max:250',
            'status' => 'bail|required',
            'date_birth' => 'bail|required',
            'type' => 'bail|required',
            'type_document' => 'bail|required',
            'number_phone1' => 'bail|required',
            'email' => 'bail|required|unique:App\Models\User,email',
            'address' => 'bail|max:500',
        ];
        $reglasJuridica = [
            //'cc_ruc' => 'bail|required|numeric|digits:13|unique:App\Models\PersonEntity,cc_ruc',
            'tradename' => 'bail|required|max:250',
            'bussines_name' => 'bail|required|max:250',
            'status' => 'bail|required|max:250',
            'date_birth' => 'bail|required',
            'type' => 'bail|required',
            'type_document' => 'bail|required',
            'number_phone1' => 'bail|required',
            'email' => 'bail|required|unique:App\Models\User,email',
            'address' => 'bail|max:500',
        ];
        if($this->type_document == 1){
            $arrayReglasNaturales = Arr::add($reglasNatural,'cc_ruc', 'bail|required|numeric|digits:10|unique:App\Models\PersonEntity,cc_ruc');
            $arrayReglasJuridicas = Arr::add($reglasJuridica,'cc_ruc', 'bail|required|numeric|digits:10|unique:App\Models\PersonEntity,cc_ruc');
        }else{
            $arrayReglasNaturales = Arr::add($reglasNatural,'cc_ruc', 'bail|required|numeric|digits:13|unique:App\Models\PersonEntity,cc_ruc');
            $arrayReglasJuridicas = Arr::add($reglasJuridica,'cc_ruc', 'bail|required|numeric|digits:13|unique:App\Models\PersonEntity,cc_ruc');
        }
        if($this->type == 1){
            return $arrayReglasNaturales;
        }else{
            return $arrayReglasJuridicas;
        }
    }

    public function attributes()
    {
        $mensajesNatural = [
            'cc_ruc' => 'Cedula',
            'name' => 'Nombres',
            'last_name' => 'Apellido paterno',
            'maternal_last_name' => 'Apellido Materno',
            'status' => 'Estado',
            //'is_person' => 'Es persona',
            'date_birth' => 'Fecha de nacimiento',
            'address' => 'Direccion',
            //'legal_representative' => 'Representante Legal',
            'type' => 'Tipo',
            'number_phone1' => 'Numero de telefono',
            'email' => 'Correo electronico',
        ];
        $mensajesJuridico = [
            'cc_ruc' => 'Ruc',
            'tradename' => 'Nombre Comercial',
            'bussines_name' => 'Razon Social',
            'status' => 'Estado',
            'date_birth' => 'Fecha de nacimiento',
            'address' => 'Direccion',
            'type' => 'Tipo',
            'number_phone1' => 'Numero de telefono',
            'email' => 'Correo electronico',
        ];
        if($this->type == 1){
            return $mensajesNatural;
        }else{
            return $mensajesJuridico;
        }
    }

    protected function prepareForValidation()
    {
        Cookie::queue('country_id', $this->country_id);
        Cookie::queue('province_id', $this->province_id);
        Cookie::queue('canton_id', $this->canton_id);
        Cookie::queue('parish_id', $this->parish_id);
    }
}
