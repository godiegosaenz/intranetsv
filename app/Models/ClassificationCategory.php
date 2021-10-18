<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassificationCategory extends Model
{
    use HasFactory;

    protected $table = 'classification_categories';

    protected $fillable = [
        'classification_id',
        'category_id',
        'canton_1',
        'canton_2',
        'canton_3',
    ];
}
