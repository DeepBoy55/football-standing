<?php

namespace App\Models;

use App\Models\club;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class standings extends Model
{
    use HasFactory;

    public function club()
{
    return $this->belongsTo(club::class, 'club_id', 'id');
}

}
