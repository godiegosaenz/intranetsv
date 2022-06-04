<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeRoom extends Model
{
    use HasFactory;

    protected $table = 'type_rooms';

    protected $fillable = [
        'name',
        'status',
    ];

    public function rooms_hotels(){
        return $this->belongsToMany(Establishments::class, 'travels_hotels_details','type_room_id','establishment_id');
    }

}
