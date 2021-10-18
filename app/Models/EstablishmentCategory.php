<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstablishmentCategory extends Model
{
    use HasFactory;

    protected $table = 'establishments_categories';

    protected $fillable = [
        'name',
    ];

    public function establishments_classifications()
    {
        return $this->belongsToMany(EstablishmentClassification::class,'classification_categories','classification_id','category_id');
    }

}
