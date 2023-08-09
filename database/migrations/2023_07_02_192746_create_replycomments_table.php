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
        Schema::create('replycomments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->longText('reppply');
            $table->uuid('newcake_id');
            $table->uuid('comment_id');
            $table->uuid('user_id');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replycomments');
    }
};
