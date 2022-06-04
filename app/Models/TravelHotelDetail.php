<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelHotelDetail extends Model
{
    use HasFactory;

    protected $table = 'travels_hotels_details';

    protected $fillable = [
        'cbp',
        'bc',
        'total',
        'bed',
        'plazas',
        'type_room_id',
        'establishment_id',
        'username',
    ];
}
