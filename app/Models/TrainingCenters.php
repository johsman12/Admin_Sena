<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCenters extends Model
{
    use HasFactory;

    protected $table = 'training_centers';

    // Campos permitidos para asignación masiva 
    protected $fillable = [
        'name',
        'location',
        'imagen_url',
        'imagen_public_id',
    ];

    public function teachers() {
        return $this->hasMany(Teachers::class, 'training_center_id');
    }

    public function courses() {
        return $this->hasMany(Courses::class, 'training_center_id');
    }
}