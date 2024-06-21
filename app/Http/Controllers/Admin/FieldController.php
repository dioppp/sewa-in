<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Http\Requests\StoreFieldRequest;
use App\Http\Requests\UpdateFieldRequest;
use App\Models\Sport;
use App\Models\Venue;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fields = Field::all();
        $venues = Venue::all();
        $sports = Sport::all();

        return view('pages.admin.field', compact('fields', 'venues', 'sports'));
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
        Field::create($request->validated());
        return redirect()->route('field.index')->with('success', 'Field created successfully');
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
    public function update(UpdateFieldRequest $request, Field $field)
    {
        if ($field) {
            $field->update($request->validated());
            return redirect()->route('field.index')->with('success', 'Field updated successfully');
        }
        return redirect()->route('field.index')->with('error', 'Field not found');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Field $field)
    {
        if ($field) {
            $field->delete();
            return redirect()->route('field.index')->with('success', 'Field deleted successfully');
        }
        return redirect()->route('field.index')->with('error', 'Field not found');
    }
}
