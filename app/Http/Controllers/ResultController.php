<?php

namespace App\Http\Controllers;

use App\Models\club;
use App\Models\result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreresultRequest;
use App\Http\Requests\UpdateresultRequest;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['clubs'] = club::all();
        $data['matched'] = result::all();
        return view('match.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['clubs'] = club::all();
        $results = result::all();
        return view('match.create', compact('results'))->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        // return $request['date'][0];

        $request->validate([
            'date' => 'required',
            'home_club_id' => 'required',
            'home_score' => 'required|min:0',
            'away_club_id' => 'required ',
            'away_score' => 'required|min:0',
        ]);
    
        // return $resultsData;

        $requests = [
            'date' => $request->date,
            'home_club_id' => $request->home_club_id,
            'away_club_id' => $request->away_club_id,
            'home_score' => $request->home_score,
            'away_score' => $request->away_score,
        ];

        // return $request;

        for ($i=0; $i < count($request->date); $i++) {

            $newResults = new result();
            $newResults->date = $requests['date'][$i];
            $newResults->home_club_id =  $requests['home_club_id'][$i];
            $newResults->home_score =$requests['home_score'][$i];
            $newResults->away_club_id =  $requests['away_club_id'][$i];
            $newResults->away_score = $requests['away_score'][$i];
            $newResults->save();

        }
    
        // return $results;

        // result::save($resultData);


        return redirect('/Hasil-Pertandingan')->with('success', 'Pertandingan berhasil disimpan.');
    }
    


    /**
     * Display the specified resource.
     */
    public function show(result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateresultRequest $request, result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(result $result)
    {
        //
    }
}
