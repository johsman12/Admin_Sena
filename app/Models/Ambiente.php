<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ubicacion',
    ];

    // Relación muchos a muchos con Cursos (a través de la tabla pivote ambiente_curso)
    public function cursos()
    {
        return $this->belongsToMany(Courses::class, 'ambiente_curso', 'ambiente_id', 'curso_id');
    }

    // Relación uno a muchos con Computadores
    public function computadores()
    {
        return $this->hasMany(Computer::class, 'ambiente_id');
    }
}