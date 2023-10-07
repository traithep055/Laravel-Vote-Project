<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;
use App\Models\User;

class VoteController extends Controller
{
    public function voteCard() {
        $parties = Party::all();
        return view('vote', compact('parties'));
    }
}
