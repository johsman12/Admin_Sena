<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    use HasFactory;
    // Un area tiene muchos instructores
    public function teachers() {
        return $this->hasMany('App\Models\Teachers', 'area_id');
    }
    // Un area tiene muchos cursos
    public function courses() {
        return $this->hasMany('App\Models\Courses', 'area_id');
    }
}
