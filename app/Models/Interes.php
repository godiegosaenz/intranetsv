<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interes extends Model
{
    use HasFactory;

    protected $table = 'interes';

    protected $fillable = [
        'id',
        'percentage',
        'initial_date',
        'final_date',
        'days',
        'year'
    ];
}
