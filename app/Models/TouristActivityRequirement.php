<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristActivityRequirement extends Model
{
    use HasFactory;

    protected $table = 'tourist_activity_requirements';

    protected $fillable = [
        'tourist_activity_id',
        'requirement_id'
    ];
}
