<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'Description',
        'type_document',
    ];

    public function tourist_activities()
    {
        return $this->belongsToMany(TouristActivity::class,'tourist_activity_requirements','requirement_id','tourist_activity_id');
    }

    public function establishments()
    {
        return $this->belongsToMany(Establishments::class,'establishment_requirements','establishment_id','requirement_id');
    }

}
