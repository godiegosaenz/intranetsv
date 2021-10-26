<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstablishmentClassification extends Model
{
    use HasFactory;

    protected $table = 'establishments_classifications';

    protected $fillable = [
        'name',
        'nomenclature',
        'tourist_activity_id',
    ];


    public function establishments_categories()
    {
        return $this->belongsToMany(EstablishmentCategory::class,'classification_categories','category_id','classification_id');
    }

}
