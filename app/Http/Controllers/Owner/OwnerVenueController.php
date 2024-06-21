<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVenueRequest;
use App\Http\Requests\UpdateVenueRequest;
use App\Models\Venue;
use Illuminate\Http\Request;

class OwnerVenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $venues = Venue::where('user_id', auth()->user()->id)->get();
        return view('pages.owner.venue', compact('venues'));
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
        //
        $validatedData = $request->validated();

        if ($request->hasFile('photo')) {
            // Store the file and get the path
            $path = $request->file('photo')->store('venues');
            // Save the path in the validated data array
            $validatedData['photo'] = $path;
        }
        Venue::create($validatedData);
        return redirect()->route('owner-venue.index')->with('success', 'Venue has been created');
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
    public function update(UpdateVenueRequest $request, Venue $owner_venue)
    {
        //
        if ($owner_venue) {
            $owner_venue->update($request->validated());
            return redirect()->route('owner-venue.index')->with('success', 'Venue has been updated');
        }
        return redirect()->route('owner-venue.index')->with('error', 'Venue not found');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venue $owner_venue)
    {
        //
        if ($owner_venue) {
            $owner_venue->delete();
            return redirect()->route('owner-venue.index')->with('success', 'Venue has been deleted');
        }
        return redirect()->route('owner-venue.index')->with('error', 'Venue not found');
    }
}
