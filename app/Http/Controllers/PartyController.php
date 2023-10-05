<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;
use File;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parties = Party::paginate(5);

        return view('index', compact('parties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'max:2028', 'image'],
            'number' => ['required', 'numeric'],
            'name' => ['required'],
            'leader' => ['required'],
            'slogan' => ['required'],
        ]);

       
        $fileName = time().'_'.$request->image->getClientOriginalName();
        $filePath = $request->image->storeAs('uploads', $fileName); //uploads/filename

        $party = new Party();
        $party->number = $request->number;
        $party->name = $request->name;
        $party->leader = $request->leader;
        $party->slogan = $request->slogan;
        $party->voter = 0;
        $party->image = 'storage/'.$filePath; // storage/uploads/filename
        $party->save();

        return redirect()->route('parties.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $party = Party::findOrFail($id);

        return view('show', compact('party'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $party = Party::findOrFail($id);
        return view('edit', compact('party'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([           
            'number' => ['required', 'numeric'],
            'name' => ['required'],
            'leader' => ['required'],
            'slogan' => ['required'],
        ]);

        $party = Party::findOrFail($id);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => ['required', 'max:2028', 'image']
            ]);

            $fileName = time().'_'.$request->image->getClientOriginalName();
            $filePath = $request->image->storeAs('uploads', $fileName); //uploads/filename

            File::delete(public_path($party->image));

            $party->image = 'storage/'.$filePath; // storage/uploads/filename
        }

        $party->number = $request->number;
        $party->name = $request->name;
        $party->leader = $request->leader;
        $party->slogan = $request->slogan;
        $party->save();

        return redirect()->route('parties.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $party = Party::findOrFail($id);
        $party->delete();

        return redirect()->route('parties.index');
    }

    public function trashed() 
    {
        $parties = Party::onlyTrashed()->get();
        return view('trashed', compact('parties'));
    }
}
