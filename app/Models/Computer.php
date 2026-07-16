<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    // DEBE ser 'number' porque es el nombre real de tu columna
    protected $fillable = ['brand', 'number'];
    
    // Relación
    public function apprentice() {
        return $this->hasOne(Apprentices::class, 'computer_id');
    }
}