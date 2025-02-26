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
        Schema::create('news_labels', function (Blueprint $table) {
            $table->unsignedBigInteger('labelID');
            $table->unsignedBigInteger('noticiaID');
            $table->primary(['labelID', 'noticiaID']);
            $table->foreign('labelID')->references('labelID')->on('labels')->onDelete('cascade');
            $table->foreign('noticiaID')->references('noticiaID')->on('news')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_labels');
    }
};
