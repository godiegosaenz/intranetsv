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
        'is_main',
        'organization_type',
        'local',
        'web_page',
        'email',
        'phone',
        'has_requeriment',
        'has_sewer',
        'has_sewage_treatment_system',
        'has_septic_tank',
        'is_patrimonial',
        'owner_id',
        'legal_representative_id',
        'tourist_activity_id',
        'classification_id',
        'username',
        'establishment_id',
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

}
