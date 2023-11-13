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
        Schema::create('memos', function (Blueprint $table) {
            $table->id();
            $table->string('author')->nullable();
            $table->string('file_number')->nullable();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('contractor_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->text('description')->required();
            $table->decimal('amount',15, 2)->nullable();
            $table->string('email')->nullable();
            $table->string('received_by')->nullable();
            $table->date('date_received')->nullable();
            $table->string('hand_carried')->nullable();
            $table->string('retrieved_by')->nullable();
            $table->date('date_retrieved')->nullable();
            $table->boolean('treated')->default(false);
            $table->date('date_treated')->nullable();
            $table->unsignedBigInteger('treated_by')->nullable();
            $table->text('notes')->nullable();
            $table->text('remarks')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();


            $table->foreign('treated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memos');
    }
};
