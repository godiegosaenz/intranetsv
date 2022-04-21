<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogue_SBU extends Model
{
    use HasFactory;

    protected $table = 'catalogue_sbu';

    protected $fillable = [
        'year',
        'value',
    ];
}
