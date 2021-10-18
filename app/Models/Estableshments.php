<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estableshments extends Model
{
    use HasFactory;

    protected $table = 'estableshments';

    protected $fillable = [
        'name',
        'start_date',
        'registry_number',
        'cadastral_registry',
        'is_main',
        'organization_type',
        'local',
        'web_page',
        'email',
        'has_sewer',
        'has_sewage_treatment_system',
        'has_septic_tank',
        'is_patrimonial',
        'owner_id',
        'legal_representative_id',
        'tourist_activity_id',
        'classification_id',
        'username',
    ];
}
