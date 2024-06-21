<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFieldRequest;
use App\Http\Requests\UpdateFieldRequest;
use App\Models\Field;
use App\Models\Sport;
use App\Models\Venue;

class OwnerFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sports = Sport::all();
        $venues = Venue::where('user_id', auth()->user()->id)->get();
        $fields = Field::whereIn('venue_id', $venues->pluck('id'))->get();
        return view('pages.owner.field', compact('fields', 'venues', 'sports'));
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
    public function store(StoreFieldRequest $request)
    {
        //
        $validatedData = $request->validated();

        if ($request->hasFile('photo')) {
            // Store the file and get the path
            $path = $request->file('photo')->store('fields');
            // Save the path in the validated data array
            $validatedData['photo'] = $path;
        }
        Field::create($validatedData);
        return redirect()->route('owner-field.index')->with('success', 'Field has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Field $field)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Field $field)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFieldRequest $request, Field $owner_field)
    {
        //
        if ($owner_field) {
            $owner_field->update($request->validated());
            return redirect()->route('owner-field.index')->with('success', 'Field has been updated');
        }
        return redirect()->route('owner-field.index')->with('error', 'Field not found');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Field $owner_field)
    {
        //
        if ($owner_field) {
            $owner_field->delete();
            return redirect()->route('owner-field.index')->with('success', 'Field has been deleted');
        }
        return redirect()->route('owner-field.index')->with('error', 'Field not found');
    }
}
