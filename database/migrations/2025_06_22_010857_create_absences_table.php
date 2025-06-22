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
        Schema::create('absences', function (Blueprint $table) {
            $table->id('id_absence');
            $table->unsignedBigInteger('id_étudiant');
            $table->unsignedBigInteger('id_séance');
            $table->boolean('est_absent')->default(true);
            $table->text('justification')->nullable();
            $table->foreign('id_étudiant')->references('id_étudiant')->on('étudiants');
            $table->foreign('id_séance')->references('id_séance')->on('séances');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};
