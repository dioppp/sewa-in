<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $venues = Venue::all();
        return view('guest', compact('venues'));
    }
}
