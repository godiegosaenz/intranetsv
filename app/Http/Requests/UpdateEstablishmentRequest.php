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
            'registry_number' => 'bail|required|numeric',
            'cadastral_registry' => '',
            'organization_type'=> 'bail|required',
            'local'=> 'bail|required',
            'web_page'=> '',
            'email' => ['bail','required','email', Rule::unique('App\Models\Establishments')->ignore($this->route('Establishments'))],
            'phone'=> 'bail|required|numeric|digits:10',
            'tourist_activity_id'=> 'required|numeric',
            'classification_id'=> 'required|numeric',
            'category_id'=> 'required|numeric',
            'establishment_id_2'=> 'bail|required|numeric',
            'owner_id'=> '',
            'legal_representative_id'=> '',
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
            'legal_representative_id'=> 'Representante legal',
        ];
    }

    protected function prepareForValidation()
    {
        Cookie::queue('tourist_activity_id', $this->tourist_activity_id);
        Cookie::queue('classification_id', $this->classification_id);
        Cookie::queue('category_id', $this->category_id);
    }
}
