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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_doctor")
                ->references("id")
                ->on("doctors")
                ->onDelete("cascade") ;
            $table->foreignId("id_patient")
                ->references("id")
                ->on("patients")
                ->onDelete("cascade") ;
            $table->integer('rate');
            $table->string('comment');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
