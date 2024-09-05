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
        Schema::create('rol_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion', 100)->nullable(false);
            $table->enum('hacerEnvios', ['Y', 'N']);
            $table->enum('modificarPaquetes', ['Y', 'N']);
            $table->enum('verEstadisticasGlobales', ['Y', 'N']);
            $table->enum('crearUsuarios', ['Y', 'N']);
            $table->enum('estadisticasDeSuSucursal', ['Y', 'N']);
            $table->enum('gestionarPaquetes', ['Y', 'N']);
            $table->enum('gestionarPaquetesGlobales', ['Y', 'N']);
            $table->enum('modificarUsuarios', ['Y', 'N']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rol_usuarios');
    }
};
