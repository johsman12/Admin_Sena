<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCenters extends Model
{
    use HasFactory;

    // Especificamos el nombre de la tabla por si acaso
    protected $table = 'training_centers';

    protected $fillable = ['name', 'location'];

    // Relaciones
    public function teachers() {
        return $this->hasMany(Teachers::class, 'training_center_id');
    }

    public function courses() {
        return $this->hasMany(Courses::class, 'training_center_id');
    }
}