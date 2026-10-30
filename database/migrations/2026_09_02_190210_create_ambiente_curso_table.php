<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ambiente_curso', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ambiente_id')->constrained('ambientes')->onDelete('cascade');
            $table->foreignId('curso_id')->constrained('courses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ambiente_curso');
    }
};