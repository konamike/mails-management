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
        Schema::create('out__memos', function (Blueprint $table) {
            $table->id();
            $table->date('out_date');
            $table->foreingId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('in_memo_id')->constrained()->cascadeOnDelete();
            $table->foreignId('document_handling_id')->constrained->cascadeOnDelete();
            $table->string('hand_carried')->nullable();
            $table->string('from')->required()->default('MD/CEO');
            $table->string('send_to')->required();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('out__memos');
    }
};
