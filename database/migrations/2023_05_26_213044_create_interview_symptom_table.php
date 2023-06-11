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
        Schema::create('interview_symptom', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('interview_id');
            $table->unsignedBigInteger('symptom_id');
            $table->text('instruction')->nullable();
            $table->string('dosage')->nullable();
            $table->foreign('symptom_id')->references('id')->on('symptoms')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('interview_id')->references('id')->on('interviews')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interview_symptom');
    }
};
