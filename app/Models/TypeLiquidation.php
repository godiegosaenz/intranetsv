<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeLiquidation extends Model
{
    use HasFactory;

    protected $table = 'type_liquidations';

    protected $fillable = [
        'name',
        'status',
        'pref',
    ];
}
