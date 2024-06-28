<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Venue;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $venues = Venue::all();
        dd($venues);
        return view('pages.admin.dashboard', compact('venues'));
    }

    public function showFields(Venue $venue)
    {
        $fields = Field::where('venue_id', $venue->id)->get();
        return view('pages.admin.dashboard', compact('fields'));
    }
}
