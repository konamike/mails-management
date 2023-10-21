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
        Schema::create('file_ins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contractor_id')->constrained()->cascadeOnDelete();
            $table->string('file_number');
            $table->unsignedBigInteger('category_id');           
            $table->string('received_by');
            $table->date('received_date');
            $table->string('document_author')->nullable(); // For communities projects, the name of the location
            $table->string('document_sender')->nullable();  
            $table->decimal('amount')->nullable();  
            $table->text('description')->required();              
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
        Schema::dropIfExists('file_ins');
    }
};
