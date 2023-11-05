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
        Schema::create('memoouts', function (Blueprint $table) {
            $table->id();
            $table->string('from')->nullable();
            $table->string('send_to')->nullable();
            $table->timestamp('date_out')->useCurrent();
            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('memo_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('memo_id')->references('id')->on('memos');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memoouts');
    }
};
