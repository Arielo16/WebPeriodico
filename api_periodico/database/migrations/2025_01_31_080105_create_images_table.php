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
        Schema::create('images', function (Blueprint $table) {
            $table->id('imagenID');
            $table->string('name', 100);
            $table->string('url_imagen', 255);
            $table->unsignedBigInteger('noticiaID')->nullable();
            $table->timestamps();
            $table->foreign('noticiaID')->references('noticiaID')->on('news')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
