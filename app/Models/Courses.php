<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    
    public function apprentices() {
        return $this->hasMany('App\Models\Apprentice');
    }

    public function area() {
        return $this->belongsTo('App\Models\Area');
    }

    public function training_center() {
        return $this->belongsTo('App\Models\TrainingCenter');
    }

    protected $fillable = [           
        'course_number',
        'day',
        'area_id',
        'training_center_id'
    ];
}