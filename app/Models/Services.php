<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'description',
        'type',
        'estado',
        'username',
    ];

    public function establishment_services(){
        return $this->belongsToMany(Establishments::class, 'establishment_services','service_id','establishment_id')->withPivot('id','services_total_beds', 'bed','services_total_plazas','services_type')->withTimestamps();
    }
}
