<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('participantes', function (Blueprint $table) {
            $table->id();
            $table->string('dni')->unique();
            $table->string('nombre_y_apellido');
            $table->string('email')->unique()->email(); // Tipo de dato específico para correo electrónico
            $table->integer('telefono');
            // ... otros campos ...
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('participantes');
    }
};