<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class touristActivity extends Model
{
    use HasFactory;

    protected $table = 'tourist_activities';

    protected $fillable = [
        'name',
    ];
}
