<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;
    // El instructor pertenece a un área
    public function area() {
        return $this->belongsTo('App\Models\Area');
    }

    // El instructor pertenece a un centro de formación
    public function training_center() {
        return $this->belongsTo('App\Models\TrainingCenter');
    }

    protected $fillable = [
        'name',
        'email',
        'cell_number',
        'area_id',
        'training_center_id',
    ];
}
