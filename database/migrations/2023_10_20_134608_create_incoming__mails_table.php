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
        Schema::create('incoming__mails', function (Blueprint $table) {
            $table->id();
            $table->email('email');
            $table->string('phone');
            $table->string('received_by');
            $table->date('received_date');
            $table->string('document_type')->required();
            $table->string('document_author')->nullable();
            $table->string('document_sender')->nullable();
            $table->unsignedBigInteger('category_id');           
            $table->string('file_number');
            $table->string('phone')->nullable();
            $table->string('description')->required();
            $table->foreignId('contractor_id')->constrained()->cascadeOnDelete();
            $table->decimal('amount')->nullable();
            $table->string('hand_carried')->nullable();
            $table->string('retrieved_by')->nullable();
            $table->date('retrieved_date')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->boolean('treated')->required();
            $table->date('treated_date')->required();
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incoming__mails');
    }
};
