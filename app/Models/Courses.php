<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    
    // Un curso tiene muchos aprendices
    public function apprentices() {
        return $this->hasMany('App\Models\Apprentices', 'course_id');
    }

    // El curso pertenece a un área
    public function area() {
        return $this->belongsTo('App\Models\Areas', 'area_id');
    }

    // El curso pertenece a un centro de formación
    public function training_center() {
        return $this->belongsTo('App\Models\TrainingCenters', 'training_center_id');
    }

    // Relación muchos a muchos con Instructores
    public function teachers() {
        return $this->belongsToMany('App\Models\Teachers', 'course_teacher', 'course_id', 'teacher_id');
    }
}