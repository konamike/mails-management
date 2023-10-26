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
        Schema::create('treats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('file_id');
            $table->boolean('treated')->required(); 
            $table->date('date_treated')->required(); 
            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();            
 
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('file_id')->references('id')->on('file_ins');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treats');
    }
};
