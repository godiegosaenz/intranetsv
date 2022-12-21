<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liquidation extends Model
{
    use HasFactory;

    protected $table = 'liquidations';

    protected $fillable = [
        'voucher_number',
        'liquidation_number',
        'liquidation_code',
        'total_payment',
        'status',
        'username',
        'observation',
        'year',
        'type_liquidation_id',
        'establishment_id',
        'is_coercive',
    ];

    public function establishment(){
        return $this->belongsTo(Establishments::class,'establishment_id');
    }

    public function liquidations_rubros()
    {
        return $this->belongsToMany(Rubro::class,'liquidation_rubros','liquidation_id','rubro_id')->withPivot('id','rubro_id','liquidation_id','value','status')->withTimestamps();
    }
}
