<?php

namespace App\Http\Controllers;

use App\Models\DataServis;

class TeknisiController extends Controller
{
    public function teknisi()
    {
        $dataservisBaru = DataServis::where('status', 'Baru')->get();
        $dataservisDiproses = DataServis::where('status', 'Diproses')->get();
        $dataservisSelesai = DataServis::where('status', 'Selesai')->get();
        $dataservisBatal = DataServis::where('status', 'Batal')->get();
        $dataservisDiambil = DataServis::where('status', 'Diambil')->get();
        return view('teknisi.index', compact('dataservisBaru', 'dataservisDiproses', 'dataservisSelesai', 'dataservisBatal', 'dataservisDiambil'));
    }
}
