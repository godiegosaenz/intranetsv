<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    use HasFactory;
    protected $table = 'rubros';

    protected $fillable = [
        'name',
        'status',
        'value',
        'accounting_account',
    ];

    public function rubros_liquidations()
    {
        return $this->belongsToMany(Liquidation::class,'liquidation_rubros','rubro_id','liquidation_id')->withPivot('id','rubro_id','liquidation_id','value','status')->withTimestamps();
    }

    public function rubros_pays(){
        return $this->belongsToMany(Pay::class,'pay_rubros','rubro_id','pay_id')->withPivot('id','rubro_id','pay_id','value')->withTimestamps();
    }
}
