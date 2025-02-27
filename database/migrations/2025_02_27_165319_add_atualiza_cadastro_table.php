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
        Schema::table('atualiza_cadastro', function (Blueprint $table) {
            $table->enum('estado_civil',['solteiro', 'casado','divorciado', 'viuvo', 'separado'])->nullable();
            $table->string('dono_aquisicao')->nullable();
            $table->string('ano_aquisicao')->nullable();
            $table->string('residentes_extras')->nullable();
            $table->string('herdeiros')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
