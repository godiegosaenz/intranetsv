<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristActivity extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'tourist_activities';

    protected $fillable = [
        'name',
    ];

    public function establishment(){
        return $this->hasMany(Establishments::class,'tourist_activity_id','id');
    }

    public function requirements()
    {
        return $this->belongsToMany(Requirement::class,'tourist_activity_requirements','tourist_activity_id','requirement_id');
    }
}
