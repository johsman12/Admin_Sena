<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;
    // El instructor pertenece a un área
    public function area() {
        return $this->belongsTo('App\Models\Areas', 'area_id');
    }

    // El instructor pertenece a un centro de formación
    public function training_center() {
        return $this->belongsTo('App\Models\TrainingCenters', 'training_center_id');
    }

    // Relación muchos a muchos con Cursos
    public function courses() {
        return $this->belongsToMany('App\Models\Courses', 'course_teacher', 'teacher_id', 'course_id');
    }
}
