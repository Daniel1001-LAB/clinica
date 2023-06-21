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
        Schema::create('appoinments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->unsignedBigInteger('office_id')->nullable(); // Nueva columna para la relación

            $table->bigInteger('specialty_id');
            $table->date('date');
            $table->time('hour');
            $table->bigInteger('hour_id');
            $table->string('status')->nullable();
            $table->string('description')->nullable();

            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade')->onUpdate('cascade'); // Clave externa para la relación con offices

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appoinments');
    }
};
