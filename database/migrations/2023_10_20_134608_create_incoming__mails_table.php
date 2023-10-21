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
            $table->date('in_date');
            $table->string('document_type')->required();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('document_author')->nullable();
            $table->string('document_sender')->nullable();
            $table->unsignedBigInteger('category_id');           
            $table->string('file_number')->unique();
            $table->string('phone')->nullable();
            $table->string('description')->required();
            $table->foreignId('contractor_id')->constrained()->cascadeOnDelete();
            $table->decimal('amount')->nullable();
            $table->string('hand_carried')->nullable();
            $table->string('retrieved_by')->nullable();
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
