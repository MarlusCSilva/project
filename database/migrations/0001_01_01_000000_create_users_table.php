<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('tipo_usuario')->nullable();
            $table->string('username')->unique();
            $table->timestamp('email_verificado_em')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('organizadores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nome_empresa')->nullable()->unique();
            $table->timestamps();
        });

        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao');
            $table->date('data');
            $table->time('hora');
            $table->string('localizacao');
            $table->string('maximo_participantes');
            $table->enum('status', ['ativo', 'inativo', 'cancelado', 'finalizado']);
            $table->string('categoria');
            $table->string('url');
            $table->foreignId('organizador_id')->constrained('organizadores')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('participantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('evento_participante', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('participante_id');
            $table->unsignedBigInteger('evento_id');
            $table->timestamps();

            $table->foreign('participante_id')->references('id')->on('participantes')->onDelete('cascade');
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
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

    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('evento_participante');
        Schema::dropIfExists('participantes');
        Schema::dropIfExists('eventos');
        Schema::dropIfExists('organizadores');
        Schema::dropIfExists('users');
    }
};
