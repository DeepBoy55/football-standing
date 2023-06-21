<?php

namespace App\Models;

use App\Models\club;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class result extends Model
{
    use HasFactory;
    protected $table = 't_matches';
    protected $primaryKey = 'id';
    protected $fillable = ['date', 'home_club_id', 'home_score', 'away_club_id', 'away_score'];


    // Definisikan relasi dengan model Club (jika diperlukan)
    public function homeTeam()
    {
        return $this->belongsTo(club::class, 'home_club_id', 'id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Club::class, 'away_club_id', 'id');
    }

}
