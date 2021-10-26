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
            'name' => 'required',
            'start_date' => 'required',
            'registry_number' => 'required',
            'cadastral_registry' => '',
            'organization_type'=> 'required',
            'local'=> 'required',
            'web_page'=> '',
            'email'=> 'required',
            'phone'=> 'required',
            'tourist_activity_id'=> 'required',
            'classification_id'=> 'required',
            'category_id'=> 'required',
            'establishment_id'=> 'required',
            'owner_id'=> 'required',
            'legal_representative_id'=> 'required',
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
