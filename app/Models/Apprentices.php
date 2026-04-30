<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprentices extends Model
{
    use HasFactory;

    // El aprendiz pertenece a un curso
    public function course() {
        return $this->belongsTo('App\Models\Courses', 'course_id');
    }

    // El aprendiz tiene asignado un computador
    public function computer() {
        return $this->belongsTo('App\Models\Computer', 'computer_id');
    }
}