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
        Schema::create('outgoing__mails', function (Blueprint $table) {
            $table->id();
            $table->date('out_date');
            $table->foreingId('user_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('incoming_mail_id');
            $table->unsignedBigInteger('document_handling_id');
            $table->string('hand_carried')->nullable();
            $table->string('from')->required()->default('MD/CEO');
            $table->string('send_to')->required();
            $table->text('remarks')->nullable();
            $table->timestamps();
            
            $table->foreign('incoming_mail_id')->references('id')->on('incoming_mails');              
            $table->foreign('document_handling')->references('id')->on('document_handlings');      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outgoing__mails');
    }
};
