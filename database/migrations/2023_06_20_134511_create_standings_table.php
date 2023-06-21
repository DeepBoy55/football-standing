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
        Schema::create('t_standings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('club_id');
            $table->integer('play');
            $table->integer('points');
            $table->integer('win');
            $table->integer('draw');
            $table->integer('lose');
            $table->integer('goal');
            $table->integer('gk');
            $table->timestamps();

            $table->foreign('club_id')->references('id')->on('t_clubs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_standings');
    }
};
