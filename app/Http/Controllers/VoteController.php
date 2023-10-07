<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;
use App\Models\User;

class VoteController extends Controller
{
    public function voteCard() 
    {
        // ดึงข้อมูลผู้ใช้ที่ล็อกอิน
        $user = auth()->user();

        // ตรวจสอบว่ามีข้อมูลผู้ใช้หรือไม่
        if ($user) {
            // ดึงชื่อและนามสกุลของผู้ใช้
            $firstname = $user->firstname;
            $lastname = $user->lastname;

            // ดึงข้อมูลพรรคการเมือง
            $parties = Party::all();

            return view('vote', compact('parties', 'firstname', 'lastname'));
        } else {
            return redirect()->route('login'); // หากไม่ได้ล็อกอิน ให้ redirect ไปยังหน้า login
        }
    }

    public function votingRight(Request $request, $id) 
    {
        // ดึงข้อมูลผู้ใช้ที่ล็อกอิน
        $user = auth()->user();

        // ตรวจสอบว่าผู้ใช้ยังไม่ได้ลงคะแนน
        if ($user->party_id === null) {
            $partyId = $request->input('party_id');
            
            // อัพเดท party_id ของผู้ใช้
            $user->party_id = $partyId;
            $user->save();

            // บวกค่า voter ในตาราง parties
            $party = Party::findOrFail($partyId);
            $party->voter += 1;
            $party->save();
        }

        return redirect()->route('home.first');
    }
}
