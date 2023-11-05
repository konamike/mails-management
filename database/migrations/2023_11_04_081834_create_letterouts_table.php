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
        Schema::create('letterouts', function (Blueprint $table) {
            $table->id();
            $table->string('from')->nullable();
            $table->string('send_to')->nullable();
            $table->date('date_out')->required();
            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('letter_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('letter_id')->references('id')->on('letters');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letterouts');
    }
};
