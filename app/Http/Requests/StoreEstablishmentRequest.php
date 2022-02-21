<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstablishmentRequest extends FormRequest
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
            'name' => 'bail|required|string',
            'start_date' => 'bail|required|date',
            'registry_number' => 'bail|required|numeric',
            'cadastral_registry' => '',
            'organization_type'=> 'bail|required',
            'local'=> 'bail|required',
            'web_page'=> '',
            'email'=> 'bail|required|email|unique:App\Models\Establishments,email',
            'phone'=> 'bail|required|numeric|digits:10',
            'tourist_activity_id'=> 'required|numeric',
            'classification_id'=> 'required|numeric',
            'category_id'=> 'required|numeric',
            'establishment_id'=> 'bail|required|numeric|unique:App\Models\Establishments,establishment_id',
            'owner_id'=> 'required|numeric',
            'legal_representative_id'=> 'required|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombres',
            'start_date' => 'fecha de inicio',
            'registry_number' => 'numero de registro',
            'cadastral_registry' => 'registro catastral',
            'organization_type'=> 'tipo de organizacion',
            'local'=> 'establecimiento',
            'web_page'=> 'pagina web',
            'email'=> 'correo electrónico',
            'phone'=> 'telefono',
            'tourist_activity_id'=> 'tipo de actividad',
            'classification_id'=> 'clasificacion',
            'category_id'=> 'categoria',
            'establishment_id'=> 'Persona / empresa',
            'owner_id'=> 'Propietario',
            'legal_representative_id'=> 'Representante legal',
        ];
    }

}
