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
        Schema::create('apadrinhamentos', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->date('nascimento');
            $table->string('cpf')->unique();
            $table->string('telefone');
            $table->string('email')->unique();
            $table->string('endereco');

            $table->string('tipo_pet');
            $table->string('nome_pet')->nullable();
            $table->string('tipo_apadrinhamento');
            $table->string('contribuicao');
            $table->string('frequencia');

            $table->tinyInteger('visita_regular');
            $table->tinyInteger('receber_atualizacoes');
            $table->tinyInteger('aceita_termos');

            $table->unsignedBigInteger('id_pet')->nullable();
            $table->foreign('id_pet')
                ->references('id')
                ->on('animals');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apadrinhamentos');
    }
};
