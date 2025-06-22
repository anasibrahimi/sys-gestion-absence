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
        Schema::create('séances', function (Blueprint $table) {
            $table->id('id_séance');
            $table->date('date');
            $table->integer('time');
            $table->unsignedBigInteger('id_module');
            $table->foreign('id_module')->references('id_module')->on('modules');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('séances');
    }
};
