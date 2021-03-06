<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstableshmentServices extends Model
{
    use HasFactory;

    protected $table = 'establishment_services';

    protected $fillable = [
        'service_id',
        'establishment_id',
        'services_type',
        'services_total_beds',
        'services_total_plazas',
    ];
}
