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
        Schema::create('étudiants', function (Blueprint $table) {
            $table->id('id_étudiant');
            $table->string('nom', 100);
            $table->string('prénom', 100);
            $table->string('email', 150)->nullable();
            $table->unsignedBigInteger('id_classe');
            $table->foreign('id_classe')->references('id_classe')->on('classes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('étudiants');
    }
};
