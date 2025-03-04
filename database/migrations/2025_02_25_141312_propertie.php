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
        
    Schema::create('properties', function (Blueprint $table) {
        $table->id();
        $table->string('titre');
        $table->text('description')->nullable();
        $table->integer('prix_par_nuit');
        $table->integer('caution')->nullable();
        $table->integer('chambres');
        $table->integer('salles_de_bain');
        $table->string('adresse');
        $table->string('ville');
        $table->string('code_postal');
        $table->date('disponibilite');
        $table->string('image');
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
