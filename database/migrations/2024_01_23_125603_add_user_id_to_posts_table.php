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
        Schema::table('posts', function (Blueprint $table) {
            // Remove foreign key constraint temporarily
            $table->dropForeign(['user_id']);
             // Add the foreign key column
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
           // Drop the foreign key column
           $table->dropForeign(['user_id']);

           // Drop the user_id column
           $table->dropColumn('user_id');
        });
    }
};
