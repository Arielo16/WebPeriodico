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
        Schema::create('news', function (Blueprint $table) {
            $table->id('noticiaID');
            $table->string('title', 200);
            $table->text('description');
            $table->integer('views')->default(0);
            $table->unsignedBigInteger('categoryID')->nullable();
            $table->string('matricula', 20)->nullable();
            $table->timestamps();
            $table->foreign('categoryID')->references('categoryID')->on('categories')->onDelete('set null');
            $table->foreign('matricula')->references('matricula')->on('writers')->onDelete('set null');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
