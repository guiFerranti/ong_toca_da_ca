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
        Schema::create('adocoes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_pet')->nullable();
            $table->foreign('id_pet')
                ->references('id')
                ->on('animals');

            $table->string('nome')->nullable();
            $table->unsignedTinyInteger('idade')->nullable();
            $table->string('profissao')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('endereco')->nullable();
            $table->string('tipo_moradia')->nullable();
            $table->string('tipo_imovel')->nullable();
            $table->tinyInteger('permite_pet')->nullable()->nullable();

            $table->string('tipo_pet')->nullable();
            $table->string('nome_pet')->nullable();

            $table->unsignedTinyInteger('qt_pessoas')->nullable();
            $table->tinyInteger('todos_aceitam')->nullable();
            $table->tinyInteger('tem_criancas')->nullable();
            $table->tinyInteger('tem_animais')->nullable();
            $table->string('animais_info')->nullable()->nullable();
            $table->tinyInteger('todos_vacinados')->nullable();

            $table->string('local_dia')->nullable();
            $table->string('local_noite')->nullable();
            $table->tinyInteger('acesso_interno')->nullable();

            $table->tinyInteger('ciente_longevidade')->nullable();
            $table->tinyInteger('cond_financeira')->nullable();
            $table->tinyInteger('ja_abandonou')->nullable();
            $table->string('motivo_abandono')->nullable()->nullable();
            $table->tinyInteger('aceita_termo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adocoes');
    }
};
