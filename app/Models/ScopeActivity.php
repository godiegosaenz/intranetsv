<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScopeActivity extends Model
{
    use HasFactory;

    protected $table = 'scope_activities';

    protected $fillable = [
        'name',
        'status',
        'type_activities_id',
    ];
}
