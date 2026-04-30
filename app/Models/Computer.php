<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;
    // El computador pertenece a un aprendiz
    public function apprentice() {
        return $this->hasOne('App\Models\Apprentices', 'computer_id');
    }
}
