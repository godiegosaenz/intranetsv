<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establishments extends Model
{
    use HasFactory;

    protected $table = 'establishments';

    protected $fillable = [
        'name',
        'start_date',
        'registry_number',
        'cadastral_registry',
        'is_register_mintel',
        'establishment_type',
        'franchise_chain',
        'local',
        'status',
        'web_page',
        'email',
        'phone',
        'observation',
        'main_street',
        'secondary_street',
        'location_reference',
        'number_establishment',
        'address',
        'lat',
        'lng',
        'register',
        'has_requeriment',
        'has_sewer',
        'has_sewage_treatment_system',
        'has_septic_tank',
        'is_patrimonial',
        'country_id',
        'province_id',
        'canton_id',
        'parish_id',
        'owner_id',
        'legal_representative_id',
        'tourist_activity_id',
        'classification_id',
        'category_id',
        'establishment_id',
        'username',
        'total_rooms',
        'total_beds',
        'total_places',
        'complementary_services',
        'total_number_employees',
        'total_number_male_employees',
        'total_number_female_employees',
        'total_number_male_manager',
        'total_number_female_manager',
        'total_number_administrative_men',
        'total_number_administrative_woman',
        'total_number_male_receptionists',
        'total_number_female_receptionists',
        'total_number_male_rooms',
        'total_number_female_rooms',
        'total_number_male_restaurant',
        'total_number_female_restaurant',
        'total_number_male_bars',
        'total_number_female_bars',
        'total_number_male_cook',
        'total_number_female_cook',
        'total_number_male_concierge',
        'total_number_female_concierge',
        'total_number_male_other',
        'total_number_female_other',
    ];

    public function tourist_activities(){
        return $this->belongsTo(TouristActivity::class,'tourist_activity_id');
    }

    public function establishments_classifications(){
        return $this->belongsTo(EstablishmentClassification::class,'classification_id');
    }

    public function people_entities_establishment(){
        return $this->belongsTo(PersonEntity::class,'establishment_id');
    }

    public function people_entities_owner(){
        return $this->belongsTo(PersonEntity::class,'owner_id');
    }

    public function people_entities_legal_representative(){
        return $this->belongsTo(PersonEntity::class,'legal_representative_id');
    }

    public function requirements()
    {
        return $this->belongsToMany(Requirement::class,'establishment_requirements','establishment_id','requirement_id')->withPivot('upload', 'name','file_path');;
    }

    public function validation_requeriments_establishment($id){

    }

}
