<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UpdateEstablishmentRequest extends FormRequest
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
        $arrayReglas = array(
            'name' => 'bail|required|string|min:2|max:190',
            'start_date' => 'bail|required|date',
            'registry_number' => '',
            'cadastral_registry' => '',
            'establishment_type'=> 'bail|required',
            'local'=> 'bail|required',
            'franchise_chain' => '',
            'web_page'=> '',
            'phone'=> 'bail|required|numeric|digits:10',
            'establishment_id_2'=> 'bail|required|numeric',
            'legal_representative_id_2'=> 'bail|required|numeric',
            'country_id' => 'bail|required|numeric',
            'province_id' => 'bail|required|numeric',
            'canton_id' => 'bail|required|numeric',
            'parish_id' => 'bail|required|numeric',
            'main_street' => 'bail|required|string|min:2|max:190',
            'location_reference' => 'bail|required|string|min:2',
            'status' => 'bail|required',
            'email' => ['bail','required','email', Rule::unique('App\Models\Establishments')->ignore($this->route('Establishments'))],
        );
        return $arrayReglas;
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
            'establishment_id_2'=> 'Persona / empresa',
            'owner_id'=> 'Propietario',
            'legal_representative_id_2'=> 'Representante legal',
            'main_street' => 'Calle principal',
            'location_reference' => 'Referencia de ubicacion',
        ];
    }

    protected function prepareForValidation()
    {
        Cookie::queue('tourist_activity_id', $this->tourist_activity_id);
        Cookie::queue('classification_id', $this->classification_id);
        Cookie::queue('category_id', $this->category_id);
        Cookie::queue('country_id', $this->country_id);
        Cookie::queue('province_id', $this->province_id);
        Cookie::queue('canton_id', $this->canton_id);
        Cookie::queue('parish_id', $this->parish_id);
    }
}
