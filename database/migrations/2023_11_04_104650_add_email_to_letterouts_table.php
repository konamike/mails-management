<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Livewire\after;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('letterouts', function (Blueprint $table) {
            $table->string('phone')->after('date_out')->nullable();
            $table->string('email')->after('letter_id')->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('letterouts', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('email');
        });
    }
};
