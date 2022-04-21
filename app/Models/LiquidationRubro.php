<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiquidationRubro extends Model
{
    use HasFactory;

    protected $table = 'liquidation_rubros';

    protected $fillable = [
        'rubro_id',
        'liquidation_id',
        'value',
        'status'
    ];
}
