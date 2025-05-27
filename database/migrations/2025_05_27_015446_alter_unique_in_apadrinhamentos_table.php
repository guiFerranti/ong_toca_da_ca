<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('apadrinhamentos', function (Blueprint $table) {
            $table->dropUnique('apadrinhamentos_cpf_unique');
            $table->dropUnique('apadrinhamentos_email_unique');

        });

        Schema::table('adocoes', function (Blueprint $table) {
            $table->dropUnique('adocoes_email_unique');

        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apadrinhamentos', function (Blueprint $table) {
            //
        });
    }
};
