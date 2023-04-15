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
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('local');
            $table->string('address');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('mobil')->nullable();
            $table->string('map')->nullable();
            $table->string('lat')->nullable();
            $table->string('lgn')->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable();

            $table->timestamps();

            $table->foreign('doctor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offices');
    }
};
