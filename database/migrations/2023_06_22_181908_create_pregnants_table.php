<?php

use App\Models\Pregnant;
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
        Schema::create('pregnants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('last_menstruation')->default(now());
            $table->integer('flow')->default(Pregnant::FLOW);
            $table->integer('cycle')->default(Pregnant::CYCLE);
            $table->date('pinar')->default(now());
            $table->date('wahl')->default(now());
            $table->date('naeguele')->default(now());
            $table->string('gender')->default('masculino');
            $table->string('status')->default(Pregnant::GESTANDO);
            $table->boolean('active')->nullable()->default(true);
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pregnants');
    }
};
