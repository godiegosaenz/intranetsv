<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PersonEntity extends Model
{
    use HasFactory;

    protected $table = 'people_entities';

    protected $fillable = [
        'cc_ruc',
        'type_document',
        'name',
        'last_name',
        //'maternal_last_name',
        'is_person',
        'is_required_accounts',
        'has_disability',
        'old_age',
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
        'email'
    ];

    public $incrementing = false;

    public function getStatusAttribute($status){
        if($status == 1){
            return 'Activo';
        }

        return 'Inactivo';
    }

    public function cultural_manager(){
        return $this->hasOne(CulturalManager::class,'people_entities_id');
    }


    public function getAgePersonAttribute(){
        return Carbon::parse($this->date_birth)->age;
    }

    public function getTypePersonAttribute(){
        if ($this->type == 1){
            return 'Natural';
        }else{
            return 'Juridica';
        }
    }
}
