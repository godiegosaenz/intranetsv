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
        'area_applications_id',
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

    public function establishments_categories(){
        return $this->belongsTo(EstablishmentCategory::class,'category_id');
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

    public function rooms_hotels(){
        return $this->belongsToMany(TypeRoom::class, 'travels_hotels_details','establishment_id','type_room_id')->withPivot('id','total', 'bed','plazas')->withTimestamps();
    }

    public function establishment_services(){
        return $this->belongsToMany(Services::class, 'establishment_services','establishment_id','service_id')->withPivot('id','services_total_beds','services_total_plazas','services_type')->withTimestamps();
    }

    public function Countries(){
        return $this->belongsTo(Country::class,'country_id');
    }

    public function provinces(){
        return $this->belongsTo(Province::class,'province_id');
    }

    public function cantons(){
        return $this->belongsTo(Canton::class,'canton_id');
    }

    public function parishes(){
        return $this->belongsTo(Parish::class,'parish_id');
    }

    public function getLocalNameAttribute(){
        $LocalName = null;
        if($this->local == 1){
            $LocalName = 'Propio';
        }else if($this->local == 2){
            $LocalName = 'Arrendado';
        }
        else{
            $LocalName = 'Cedido';
        }
        return $LocalName;
    }

    public function getEstablishmentTypeNameAttribute(){
        $typeName = null;
        if($this->establishment_type == 1){
            $typeName = 'Ninguno';
        }else if($this->establishment_type == 2){
            $typeName = 'Franquicia';
        }
        else{
            $typeName = 'Candena/Sucursal';
        }
        return $typeName;
    }

    public function getStatusNameAttribute(){
        if($this->status == 1){
            return 'Abierto';
        }else{
            return 'Cerrado';
        }
    }

    public function getLastNameFullAttribute(){
        return $this->last_name.' '.$this->maternal_last_name;
    }

}
