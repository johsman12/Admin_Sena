<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'course',             // <-- Agregado para que se pueda leer
        'course_number',
        'day',
        'area_id',
        'training_center_id',
    ];
    
    public function apprentices() {
        return $this->hasMany('App\Models\Apprentices', 'course_id');
    }

    public function area() {
        return $this->belongsTo('App\Models\Areas', 'area_id');
    }

    public function training_center() {
        return $this->belongsTo('App\Models\TrainingCenters', 'training_center_id');
    }

    public function teachers() {
        return $this->belongsToMany('App\Models\Teachers', 'course_teacher', 'course_id', 'teacher_id');
    }
}