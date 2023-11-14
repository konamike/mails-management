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
        Schema::table('files', function (Blueprint $table) {
            $table->date('date_dispatched')->after('date_received')->nullable();
            $table->string('sent_from')->after('treated_by')->nullable();
            $table->string('sent_to')->after('sent_from')->nullable();
            $table->string('dispatch_phone',11)->after('sent_to')->nullable();
            $table->string('dispatch_email')->nullable();
            $table->string('dispatched_by')->nullable();
            $table->text('dispatch_remarks')->nullable();
            $table->boolean('dispatched')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('files', function (Blueprint $table) {
            $table->dropColumn('date_dispatched');  
            $table->dropColumn('sent_from');
            $table->dropColumn('sent_to');
            $table->dropColumn('dispatch_phone');
            $table->dropColumn('dispatch_email');
            $table->dropColumn('dispatched_by'); 
            $table->dropColumn('dispatch_remarks');
            $table->dropColumn('dispatched');
        });
    }
};
