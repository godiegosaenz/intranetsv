<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstablishmentRequirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'requirement_id',
        'establishment_id',
        'upload',
        'name',
        'file_path',
    ];
}
