<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InitialEmissionValue extends Model
{
    use HasFactory;

    protected $table = 'initial_emission_values';

    protected $fillable = [
        'rubro_id',
        'year',
        'initial_value',
        'status'
    ];

    public function rubros(){
        return $this->belongsTo(Rubro::class,'rubro_id');
    }

    public function getInitialValueFormatAttribute(){

        return number_format($this->initial_value, 2, ',', '.');

    }

}
