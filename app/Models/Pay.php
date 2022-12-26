<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use HasFactory;

    protected $table = 'pays';

    protected $fillable = [
        'id',
        'payment_day',
        'status',
        'user',
        'value',
        'discount',
        'surcharge',
        'interest',
        'observation',
        'name_person',
        'voucher_number',
        'personentity_id',
        'liquidation_id'
    ];
}
