<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayRubro extends Model
{
    use HasFactory;

    protected $table = 'pay_rubros';

    protected $fillable = [
        'id',
        'rubro_id',
        'pay_id',
        'value'
    ];
}
