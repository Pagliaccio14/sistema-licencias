<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('licencias', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('apellido_paterno');
        $table->string('apellido_materno');
        $table->integer('edad');
        $table->string('telefono');
        $table->string('direccion');
        $table->string('tipo_licencia');
        $table->date('fecha_expedicion');
        $table->date('fecha_vencimiento');
        $table->string('tipo_sangre')->nullable();
        $table->timestamps();
        $table->string('foto')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licencias');
    }
};
