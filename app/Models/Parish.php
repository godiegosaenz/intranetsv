<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
    use HasFactory;

    protected $table = 'parishes';

    protected $fillable = [
        'name',
        'code',
        'canton_id',
        'type',
    ];
}
