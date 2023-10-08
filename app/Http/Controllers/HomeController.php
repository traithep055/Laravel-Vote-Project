<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;

class HomeController extends Controller
{
    public function index() 
    {
        $parties = Party::all();
        return view('home', compact('parties'));    
    }

    public function showData(string $id)
    {
        $party = Party::findOrFail($id);

        return view('show', compact('party'));
    }
}
