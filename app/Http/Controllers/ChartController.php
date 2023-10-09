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
        // $parties = Party::select('number', 'name', 'voter')->get();

        // // Initialize the data with the column names
        // $data = [['Number', 'Name', 'Voter']];

        // foreach ($parties as $party) {
        //     // Add data for each party
        //     $data[] = [$party->number, $party->name, (int)$party->voter];
        // }

        // return view('chart', compact('data'));
        // ดึงข้อมูลพรรคทั้งหมดและเรียงลำดับตามจำนวนผู้ลงคะแนนจากมากไปน้อย
        // ดึงข้อมูลพรรคทั้งหมดและเรียงลำดับตามจำนวนผู้ลงคะแนนจากมากไปน้อย
        // ดึงข้อมูลพรรคทั้งหมดและเรียงลำดับตามจำนวนผู้ลงคะแนนจากมากไปน้อย
        $parties = Party::orderBy('voter', 'desc')->get();

        // นำเอาพรรค 3 อันดับแรก
        $topParties = $parties->take(3);

        // คำนวณผู้ลงคะแนนรวม
        $totalVoters = $parties->sum('voter');

        // ส่งพรรค 3 อันดับแรกและผู้ลงคะแนนรวมไปยังหน้าเว็บ
        $data = [];
        $data[] = ['Number', 'Name', 'Voter'];
        foreach ($parties as $party) {
            $data[] = [$party->number, $party->name, (int)$party->voter];
        }

        return view('chart', compact('topParties', 'totalVoters', 'data'));
    }

    public function getChartData()
    {
        $parties = Party::all(['name', 'voter']);
        $data = [];
        $data[] = ['Party', 'Voters'];

        foreach ($parties as $party) {
            $data[] = [$party->name, (int)$party->voter];
        }

        return response()->json(['data' => $data]);
    }

}
