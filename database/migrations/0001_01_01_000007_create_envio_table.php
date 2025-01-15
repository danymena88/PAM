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
        Schema::create('envio', function (Blueprint $table) {
            $table->id();
            $table->enum('aprobadoPamRemitente', ['Y', 'N']);
            $table->enum('aprobadoPamDestino', ['Y', 'N']);
            $table->enum('recibidoDestinatario', ['Y', 'N']);
            $table->enum('anulado', ['Y', 'N']);
            $table->dateTime('fechaRecibido', precision: 0)->nullable();
            $table->bigInteger('sucRemitente')->unsigned()->nullable(false);
            $table->bigInteger('sucDestinatario')->unsigned()->nullable(false);
            $table->bigInteger('idRemitente')->unsigned()->nullable(false);
            $table->bigInteger('idDestinatario')->unsigned()->nullable(false);
            $table->bigInteger('idDescripcionPaquete')->unsigned()->nullable(false);
            $table->bigInteger('idCodigoPaquete')->unsigned()->nullable(false);
            $table->foreign('idRemitente')->references('id')->on('users')->noActionOnDelete();
            $table->foreign('idDestinatario')->references('id')->on('users')->noActionOnDelete();
            $table->foreign('idDescripcionPaquete')->references('id')->on('paquete')->noActionOnDelete();
            $table->foreign('idCodigoPaquete')->references('id')->on('codigos')->noActionOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envio');
    }
};
