<?php

namespace App\Http\Controllers;

use App\Models\club;
use App\Models\result;
use App\Models\standings;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorestandingsRequest;
use App\Http\Requests\UpdatestandingsRequest;

class StandingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = result::all();

        $standings = [];

        foreach ($results as $result) {
            $homeClubId = $result->home_club_id;
            $awayClubId = $result->away_club_id;
            $homeScore = $result->home_score;
            $awayScore = $result->away_score;

            $this->updateStandings($standings, $homeClubId, $awayClubId, $homeScore, $awayScore);
        }

        usort($standings, function ($a, $b) {
            if ($a['points'] !== $b['points']) {
                return $b['points'] - $a['points'];
            } elseif ($a['goal_difference'] !== $b['goal_difference']) {
                return $b['goal_difference'] - $a['goal_difference'];
            } else {
                return $b['goals_for'] - $a['goals_for'];
            }
        });

        return view('standings.index', compact('standings'));
    }

    private function updateStandings(&$standings, $homeClubId, $awayClubId, $homeScore, $awayScore)
{
    // Update klasemen untuk klub tuan rumah
    if (!isset($standings[$homeClubId])) {
        $standings[$homeClubId] = $this->initializeStanding($homeClubId);
    }
    $standings[$homeClubId]['played']++;
    $standings[$homeClubId]['goals_for'] += $homeScore;
    $standings[$homeClubId]['goals_against'] += $awayScore;

    // Update klasemen untuk klub tamu
    if (!isset($standings[$awayClubId])) {
        $standings[$awayClubId] = $this->initializeStanding($awayClubId);
    }
    $standings[$awayClubId]['played']++;
    $standings[$awayClubId]['goals_for'] += $awayScore;
    $standings[$awayClubId]['goals_against'] += $homeScore;

    // Tentukan poin berdasarkan skor pertandingan
    if ($homeScore > $awayScore) {
        $standings[$homeClubId]['points'] += 3; // Tuan rumah menang
        $standings[$homeClubId]['wins']++; // Tuan rumah menang
        $standings[$awayClubId]['losses']++; // Tamu kalah
    } elseif ($homeScore < $awayScore) {
        $standings[$awayClubId]['points'] += 3; // Tamu menang
        $standings[$awayClubId]['wins']++; // Tamu menang
        $standings[$homeClubId]['losses']++; // Tuan rumah kalah
    } else {
        $standings[$homeClubId]['points'] += 1; // Seri
        $standings[$homeClubId]['draws']++; // Seri
        $standings[$awayClubId]['points'] += 1; // Seri
        $standings[$awayClubId]['draws']++; // Seri
    }

    // Perhitungan selisih gol
    $standings[$homeClubId]['goal_difference'] = $standings[$homeClubId]['goals_for'] - $standings[$homeClubId]['goals_against'];
    $standings[$awayClubId]['goal_difference'] = $standings[$awayClubId]['goals_for'] - $standings[$awayClubId]['goals_against'];
}


    private function initializeStanding($clubId)
    {
        $club = club::find($clubId);

        return [
            'club_id' => $clubId,
            'club_name' => $club->name,
            'points' => 0,
            'played' => 0,
            'wins' => 0,
            'losses' => 0,
            'draws' => 0,
            'goals_for' => 0,
            'goals_against' => 0,
            'goal_difference' => 0,
        ];
    }
}
