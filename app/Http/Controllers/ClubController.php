<?php

namespace App\Http\Controllers;

use App\Models\club;
use Illuminate\Support\Str;
use App\Http\Requests\StoreclubRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateclubRequest;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['clubs'] = club::all();
        return view('clubs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clubs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreclubRequest $request)
    {

        // return $request;
        // dd($request);
        $request->validate([
            'name' => 'required|unique:t_clubs|',
            'city' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $club = new Club();
        $club->name = $request->input('name');
        $club->city = $request->input('city');
    
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/clubs', $fileName);
            $club->img = $fileName;
        }
    
        $club->save();

        return redirect('/data-klub')->with('Success', 'Data Klub Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(club $club)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateclubRequest $request, club $club)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(club $club)
    {
        //
    }
}
