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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id(); // Clé primaire (id)
            $table->string('title'); // Colonne 'title' (VARCHAR)
            $table->text('description'); // Colonne 'description' (TEXT)
            $table->boolean('status'); // Je rajoute ce champs pour la partie Mosel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
