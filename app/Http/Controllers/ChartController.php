<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;

class ChartController extends Controller
{
    // public function Chartpage() 
    // {
    //     $parties = Party::get();

    //     return view('chart', compact('parties'));
    // }

    public function Piechart() 
    {
        $parties = Party::select('number', 'name', 'voter')->get();

        // Initialize the data with the column names
        $data = [['Number', 'Name', 'Voter']];

        foreach ($parties as $party) {
            // Add data for each party
            $data[] = [$party->number, $party->name, (int)$party->voter];
        }

        return view('chart', compact('data'));
    }

}
