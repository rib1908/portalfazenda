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
        Schema::create('atualiza_cadastro', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf');
            $table->string('email');
            $table->string('data_nascimento');
            $table->string('celular');
            $table->string('nome_mae');
            $table->string('cep');
            $table->string('rua');
            $table->string('bairro');
            $table->string('municipio');
            $table->string('numero');
            $table->string('complemento')->nullable();
            $table->string('estado');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atualiza_cadastro');
    }
};
