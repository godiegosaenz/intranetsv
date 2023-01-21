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

    public function rubro(){
        return $this->belongsToMany(Rubro::class,'pay_rubros','pay_id','rubro_id')->withPivot('id','rubro_id','pay_id','value')->withTimestamps();
    }

    public function liquidation(){
        return $this->belongsTo(Liquidation::class,'liquidation_id');
    }

    public function getUserNameAttribute(){
        $arrayUser = explode('@',$this->user);
        return $arrayUser[0];
    }

    public function getNumComprobanteAttribute(){
        return str_pad($this->id, 6, '0', STR_PAD_LEFT);
    }
}
