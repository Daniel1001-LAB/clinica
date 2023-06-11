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
        Schema::create('surgery_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('surgery_id');
            $table->unsignedBigInteger('year');
            $table->unsignedBigInteger('user_id');
            $table->foreign('surgery_id')->references('id')->on('surgeries')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surgery_user');
    }
};
