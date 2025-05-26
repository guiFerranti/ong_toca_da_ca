<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('accountability_entries', function (Blueprint $table) {
            $table->id();
            $table->date('payment_date');
            $table->decimal('amount', 10, 2);
            $table->text('description');
            $table->string('image_url');
            $table->string('status')->default('pending');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('admins');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('accountability_entries');
    }
};
