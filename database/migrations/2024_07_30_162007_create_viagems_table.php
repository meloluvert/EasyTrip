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
        Schema::create('viagems', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable(false);
            $table->string('nome')->nullable(false);
            $table->unsignedBigInteger('carro')->nullable(true);
            $table->unsignedBigInteger('endereco_chegada')->nullable(true);
            $table->unsignedBigInteger('endereco_saida')->nullable(true);
            $table->dateTime('horario_saida');
            $table->unsignedBigInteger('motorista')->nullable(true);
            $table->foreign('carro')->references('id')->on('carros');
            $table->foreign('endereco_chegada')->references('id')->on('locals');
            $table->foreign('endereco_saida')->references('id')->on('locals');
            $table->foreign('motorista')->references('id')->on('motoristas');
            
            $table->string('link_foto')->nullable(true)->default(NULL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viagems');
    }
};
