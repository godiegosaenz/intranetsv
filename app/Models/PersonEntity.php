<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonEntity extends Model
{
    use HasFactory;

    protected $table = 'people_entities';

    protected $fillable = [
        'cc_ruc',
        'name',
        'last_name',
        'maternal_last_name',
        'is_person',
        'date_birth',
        'state',
        'address',
        'legal_representative',
        'tradename',
        'bussines_name',
        'type',
        'number_phone1',
        'number_phone2',
        'email',
        'country_id',
        'province_id',
        'canton_id'
    ];

    public $incrementing = false;
}
