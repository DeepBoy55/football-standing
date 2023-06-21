<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class club extends Model
{
    use HasFactory;
    protected $table = 't_clubs';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'city', 'img'];

    public function resultsAsHomeClub()
    {
        return $this->hasMany(Result::class, 'home_club_id');
    }

    public function resultsAsAwayClub()
    {
        return $this->hasMany(Result::class, 'away_club_id');
    }

    public function standings()
{
    return $this->hasMany(Standings::class, 'id', 'club_id');
}

}
