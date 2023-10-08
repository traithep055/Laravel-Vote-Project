<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;
use PDF;

class PDFController extends Controller
{
    public function index(Request $request) 
    {
        $parties = Party::all();

        // กำหนดที่อยู่ของฟอนต์เป็นฟอนต์ Kanit
        $fontPath = public_path('fonts/Kanit-Regular.ttf');

        if ($request->has('download')) {
            // โหลด view และใช้ฟอนต์ Kanit
            $pdf = PDF::loadView('parties-pdf', compact('parties'))
                       ->setOptions([
                           'isHtml5ParserEnabled' => true,
                           'isPhpEnabled' => true,
                           'defaultFont' => 'kanit'  // กำหนดฟอนต์เริ่มต้น
                       ])
                       ->setPaper('a4')
                       ->setOption('margin-top', 10)
                       ->setOption('margin-right', 10)
                       ->setOption('margin-bottom', 10)
                       ->setOption('margin-left', 10);
            
            return $pdf->download('pdfview.pdf');
        }
        return view('parties-pdf', compact('parties'));
    }
}
