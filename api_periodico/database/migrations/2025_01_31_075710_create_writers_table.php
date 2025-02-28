<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('writers', function (Blueprint $table) {
            $table->string('matricula', 20)->primary();
            $table->string('name', 100);
            $table->string('last_name', 100);
            $table->string('secund_last_name', 100)->nullable();
            $table->timestamps();
        });

        // Insert initial data
        DB::table('writers')->insert([
            [
                'matricula' => 'ABC123',
                'name' => 'John',
                'last_name' => 'Doe',
                'secund_last_name' => 'Smith',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'matricula' => 'DEF456',
                'name' => 'Jane',
                'last_name' => 'Doe',
                'secund_last_name' => 'Johnson',
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
        Schema::dropIfExists('writers');
    }
};
