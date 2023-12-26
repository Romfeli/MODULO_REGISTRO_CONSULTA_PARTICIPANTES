<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('participantes', function (Blueprint $table) {
        $table->id(); // Esto debería configurar 'id' para autoincrementarse
        $table->string('dni');
        $table->string('nombre_y_apellido');
        $table->string('email');
        $table->string('telefono');
        $table->timestamps();
        $table->text('firmaBase64')->nullable();
        });
}


    public function down(): void
    {
        Schema::dropIfExists('participantes');
    }
};
