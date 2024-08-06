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
        Schema::create('carros', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable(false);
            $table->string('nome')->nullable(false);
            $table->string('placa_veiculo')->nullable(false);
            $table->integer('ano_carro')->nullable(false);
            $table->timestamps();

            $table->string('link_foto')->nullable(true)->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carros');
    }
};
