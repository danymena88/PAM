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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('primerNombre', 50)->nullable(false);
            $table->string('segundoNombre', 50)->nullable();
            $table->string('tarcerNombre', 50)->nullable();
            $table->string('primerApellido', 50)->nullable(false);
            $table->string('segundoApellido', 50)->nullable();
            $table->string('apellidoCasada', 50)->nullable();
            $table->enum('genero', ['M', 'F'])->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('cargo', 50)->nullable(false);
            $table->bigInteger('id_rol_usuarios')->unsigned()->nullable(false);
            $table->bigInteger('id_sucursal')->unsigned()->nullable(false);
            $table->foreign('id_rol_usuarios')->references('id')->on('rol_usuarios')->noActionOnDelete();
            $table->foreign('id_sucursal')->references('id')->on('sucursal')->noActionOnDelete();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
