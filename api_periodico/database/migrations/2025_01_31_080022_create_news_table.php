<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Asegúrate de importar DB

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('news');

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

        // Insert initial data
        DB::table('news')->insert([
            [
                'title' => 'New AI Technology Revolutionizes Healthcare',
                'description' => 'A groundbreaking AI technology is set to revolutionize the healthcare industry by providing faster and more accurate diagnoses.',
                'views' => 150,
                'categoryID' => 1, // Technology
                'matricula' => 'ABC123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Health Benefits of a Plant-Based Diet',
                'description' => 'Recent studies show that a plant-based diet can significantly improve overall health and reduce the risk of chronic diseases.',
                'views' => 200,
                'categoryID' => 2, // Health
                'matricula' => 'DEF456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Local Team Wins Championship',
                'description' => 'The local sports team clinched the championship title in a thrilling final match that kept fans on the edge of their seats.',
                'views' => 300,
                'categoryID' => 3, // Sports
                'matricula' => 'ABC123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropForeign(['categoryID']);
            $table->dropForeign(['matricula']);
        });

        Schema::dropIfExists('news');
    }
};
