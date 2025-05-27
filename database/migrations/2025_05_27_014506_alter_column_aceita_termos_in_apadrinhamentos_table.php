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
            $table->renameColumn('aceita_termo', 'aceita_termos');
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
