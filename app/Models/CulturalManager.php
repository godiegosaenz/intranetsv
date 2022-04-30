<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CulturalManager extends Model
{
    use HasFactory;

    protected $table = 'cultural_managers';

    protected $fillable = [
        'name',
        'status',
        'type_activities_id',
        'scope_activities_id',
        'country_id',
        'province_id',
        'canton_id',
        'parish_id'
    ];

    public function people_entities(){
        return $this->belongsTo(PersonEntity::class,'people_entities_id');
    }

    public function scope_activity(){
        return $this->belongsTo(ScopeActivity::class,'scope_activities_id');
    }

    public function type_activity(){
        return $this->belongsTo(TypeActivity::class,'type_activities_id');
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


}
