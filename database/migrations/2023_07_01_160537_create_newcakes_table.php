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
        Schema::create('newcakes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nameofperson');
            $table->string('nameofcake');
            $table->string('tell');
            $table->integer('price');
            $table->longText('more');
            $table->string('image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newcakes');
    }
};
