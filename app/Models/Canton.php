<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    use HasFactory;

    protected $table = 'cantons';

    protected $fillable = [
        'name',
        'code',
        'province_id',
    ];

    public $incrementing = false;
}
