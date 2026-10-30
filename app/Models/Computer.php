<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    protected $table = 'computers';

    // Campos permitidos para asignación masiva 
    protected $fillable = [
        'number',
        'brand',
        'imagen_url',
        'imagen_public_id',
    ];

    public function apprentice() {
        return $this->hasOne(Apprentices::class, 'computer_id');
    }

    public function ambiente(){
        return $this->belongsTo(Ambiente::class, 'ambiente_id');
    }
}