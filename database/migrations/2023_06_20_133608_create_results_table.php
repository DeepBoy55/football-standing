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
        Schema::create('t_matches', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('home_club_id');
            $table->unsignedBigInteger('away_club_id');
            $table->integer('home_score');
            $table->integer('away_score');
            $table->timestamps();
        
            $table->foreign('home_club_id')->references('id')->on('t_clubs');
            $table->foreign('away_club_id')->references('id')->on('t_clubs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_matches');
    }
};
