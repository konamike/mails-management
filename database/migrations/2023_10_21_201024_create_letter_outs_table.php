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
        Schema::create('letter_outs', function (Blueprint $table) {
            $table->id();
            $table->date('out_date');
            $table->string('hand_carried')->nullable();
            $table->string('from')->required()->default('MD/CEO');
            $table->string('send_to')->required();

            $table->boolean('treated')->required(); //Engineers
            $table->date('date_treated')->required(); //Engineers
            $table->string('processed_by')->required();// Engineers

            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('letter_in_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');            
            $table->foreign('letter_in_id')->references('id')->on('letter_ins');            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_outs');
    }
};
