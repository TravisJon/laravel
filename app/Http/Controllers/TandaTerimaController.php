<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\DataPelanggan;
use App\Models\DataServis;
use App\Models\JenisBarang;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TandaTerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datapelanggan = DataPelanggan::all();
        $user = User::where('role_id', 2)->get();
        $jenisbarang = JenisBarang::all();
        return view('TandaTerima.add_tandaterima', compact('datapelanggan', 'user', 'jenisbarang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newDataId = DB::table("data_servis")->insertGetId([
            'pelanggan_id' => $request->pelanggan_id,
            'teknisi_id' => $request->teknisi_id,
            'jenis_barang_id' => $request->jenis_barang_id,
            'kerusakan' => $request->kerusakan,
            'tipe' => $request->tipe,
            'kelengkapan' => $request->kelengkapan,
            'serial_number' => $request->serial_number,
            'catatan' => $request->catatan,
            'status' => 'Baru',
            'kasir' => Auth::user()->nama,
            'created_at' => now(),
        ]);
        // Redirect ke halaman yang hanya menampilkan data baru
        return redirect()->route('tandaterima.show', ['id' => $newDataId])->with('success', 'Data Servis Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mengambil data service berdasarkan ID
        $db = DataServis::with(['datapelanggan', 'user', 'jenisbarang'])->find($id);

        // Menampilkan view dengan data service baru
        return view('TandaTerima.show_tandaterima', compact('db'));
    }

    public function cetak_tandaterima($id)
    {
        $dataServis = DataServis::with('datapelanggan', 'user', 'jenisbarang')->find($id);

        if (!$dataServis) {
            return redirect()->back()->with('error', 'Data Servis tidak ditemukan.');
        }

        return view('TandaTerima.cetak-tandaterima', compact('dataServis'));

        // $pdf = Pdf::loadView('TandaTerima.cetak-tandaterima', compact('dataServis'));
        // return $pdf->stream('AppServis.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
