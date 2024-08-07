<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use App\Http\Requests\StoreVenueRequest;
use App\Http\Requests\UpdateVenueRequest;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $venues = Venue::all();
        return view('pages.admin.venue', compact('venues'));
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
    public function store(StoreVenueRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('venues');
            $validatedData['photo'] = $path;
        }

        Venue::create($validatedData);

        return redirect()->route('venue.index')->with('success', 'Venue created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Venue $venue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venue $venue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVenueRequest $request, Venue $venue)
    {
        if ($venue) {
            $data = $request->validated();

            if ($request->hasFile('photo')) {
                $path = $request->file('photo')->store('venues');
                $data['photo'] = $path;
            }
            $venue->update($data);

            return redirect()->route('venue.index')->with('success', 'Venue updated successfully');
        }
        return redirect()->route('venue.index')->with('error', 'Venue not found');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venue $venue)
    {
        if ($venue) {
            $venue->delete();
            return redirect()->route('venue.index')->with('success', 'Venue deleted successfully');
        }
        return redirect()->route('venue.index')->with('error', 'Venue not found');
    }
}
