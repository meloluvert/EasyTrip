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
        Schema::create('viagem_passageiros', function (Blueprint $table) {
            $table->unsignedBigInteger('viagem_id');
            $table->foreign('viagem_id')->references('id')->on('viagems');
            $table->unsignedBigInteger('passageiro_id');
            $table->foreign('passageiro_id')->references('id')->on('passageiros');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viagem_passageiros');
    }
};
