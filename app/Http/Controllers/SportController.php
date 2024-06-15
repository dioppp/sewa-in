<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Http\Requests\StoreSportRequest;
use App\Http\Requests\UpdateSportRequest;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sports = Sport::all();
        return view('pages.admin.sport', compact('sports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSportRequest $request)
    {
        $sport = Sport::create($request->validated());
        return redirect()->route('sport.index')->with('success', 'Sport created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sport $sport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSportRequest $request, Sport $sport)
    {
        if ($sport) {
            $sport->update($request->validated());
            return redirect()->route('sport.index')->with('success', 'Sport updated successfully');
        }
        return redirect()->route('sport.index')->with('error', 'Sport not found');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sport $sport)
    {
        if ($sport) {
            $sport->delete();
            return redirect()->route('sport.index')->with('success', 'Sport deleted successfully');
        }
        return redirect()->route('sport.index')->with('error', 'Sport not found');
    }
}
