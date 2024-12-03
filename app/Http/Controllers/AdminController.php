<?php

namespace App\Http\Controllers;

use App\Models\DataPelanggan;
use App\Models\DataServis;

class AdminController extends Controller
{
    public function admin()
    {
        $dataservisBaru = DataServis::where('status', 'Baru')->get();
        $dataservisDiproses = DataServis::where('status', 'Diproses')->get();
        $dataservisSelesai = DataServis::where('status', 'Selesai')->get();
        $dataservisBatal = DataServis::where('status', 'Batal')->get();
        $dataservisDiambil = DataServis::where('status', 'Diambil')->get();
        $pelanggan = DataPelanggan::all();
        return view('admin.index', compact('pelanggan', 'dataservisBaru', 'dataservisDiproses', 'dataservisSelesai', 'dataservisBatal', 'dataservisDiambil'));
    }
}
