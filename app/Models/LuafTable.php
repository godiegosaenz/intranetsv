<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuafTable extends Model
{
    use HasFactory;

    protected $table = 'luaf_tables';

    protected $fillable = [
        'tourist_activity_id',
        'classification_id',
        'category_id',
        'percentage',
        'year',
        'observacion',
    ];

    public function tourist_activities(){
        return $this->belongsTo(TouristActivity::class,'tourist_activity_id');
    }

    public function establishments_classifications(){
        return $this->belongsTo(EstablishmentClassification::class,'classification_id');
    }

    public function establishments_categories(){
        return $this->belongsTo(EstablishmentCategory::class,'category_id');
    }

}
