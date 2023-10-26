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
        Schema::create('memo_ins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');   
            $table->string('file_number');  
            $table->string('received_by');
            $table->date('received_date');
            $table->string('document_originator')->nullable(); // For communities projects, the name of the location
            $table->string('document_sender')->nullable();  
            $table->string('phone', 11)->nullable(); 
            $table->decimal('amount',15,2)->nullable();  
            $table->text('description')->required();              
            $table->string('hand_carried')->nullable();
            $table->string('retrieved_by')->nullable();
            $table->date('retrieved_date')->nullable();
            $table->boolean('treated')->required();
            $table->date('treated_date')->required();
            $table->text('remarks')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memo_ins');
    }
};
