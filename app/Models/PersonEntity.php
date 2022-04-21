<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonEntity extends Model
{
    use HasFactory;

    protected $table = 'people_entities';

    protected $fillable = [
        'cc_ruc',
        'name',
        'last_name',
        'maternal_last_name',
        'is_person',
        'date_birth',
        'status',
        'address',
        //'legal_representative',
        'tradename',
        'bussines_name',
        'type',
        'type_document',
        'number_phone1',
        'number_phone2',
        'email',
        //'country_id',
        //'province_id',
        //'canton_id',
        //'parish_id'
    ];

    public $incrementing = false;

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

    public function getStatusAttribute($status){
        if($status == 1){
            return 'Activo';
        }

        return 'Inactivo';
    }

    public function cultural_manager(){
        return $this->hasOne(CulturalManager::class,'people_entities_id');
    }
}
