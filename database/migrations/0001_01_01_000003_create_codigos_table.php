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
        Schema::create('codigos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 50);
            $table->enum('disponible', ['Y', 'N']);
            $table->enum('impreso', ['Y', 'N']);
            $table->timestamps();
        });
    }

    public $timestamps = false;

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('codigos');
    }
};
