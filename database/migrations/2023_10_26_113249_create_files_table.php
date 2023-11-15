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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contractor_id')->constrained()->cascadeOnDelete();
            $table->string('file_number');
            $table->unsignedBigInteger('category_id');
            $table->string('received_by');
            $table->date('date_received');
            $table->string('document_author')->nullable(); // For communities projects, the name of the location
            $table->string('document_sender')->nullable();
            $table->decimal('amount',15, 2)->nullable();
            $table->text('description')->required();
            $table->string('hand_carried')->nullable();
            $table->string('retrieved_by')->nullable();
            $table->date('date_retrieved')->nullable();
            $table->string('email')->nullable();
            $table->boolean('treated')->default(false);
            $table->date('date_treated')->nullable();
            $table->unsignedBigInteger('treated_by')->nullable();// Engineer who treated the file
            $table->text('notes')->after('user_id')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('treated_by')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
