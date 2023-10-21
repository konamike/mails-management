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
        Schema::create('document_handlings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('incoming_mail_id');
            $table->boolean('treated')->required();
            $table->date('date_treated')->required();
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->foreign('incoming_mail_id')->references('id')->on('incoming_mails');  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_handlings');
    }
};
