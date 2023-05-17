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
        Schema::create('workdays', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(false);
            $table->boolean('morning_active')->default(false);
            $table->boolean('afternoon_active')->default(false);
            $table->boolean('evening_active')->default(false);
            $table->integer('day')->default(0);
            $table->integer('morning_start')->default(0);
            $table->integer('morning_end')->default(0);
            $table->integer('afternoon_start')->default(0);
            $table->integer('afternoon_end')->default(0);
            $table->integer('evening_start')->default(0);
            $table->integer('evening_end')->default(0);
            $table->integer('morning_office')->default(0);
            $table->integer('afternoon_office')->default(0);
            $table->integer('evening_office')->default(0);
            $table->float('morning_price')->default(0);
            $table->float('afternoon_price')->default(0);
            $table->float('evening_price')->default(0);
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workdays');
    }
};
