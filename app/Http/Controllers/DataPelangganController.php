<?php

namespace App\Http\Controllers;

use App\Models\DataPelanggan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class DataPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $db = DB::table('datapelanggan')->get();

        $title = 'Delete!';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('DataMaster.datapelanggan.datapelanggan', compact('db'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('DataMaster.datapelanggan.addpelanggan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table("datapelanggan")->insert([
            'nama' => $request->nama,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'created_at' => now()
        ]);
        return redirect('/datapelanggan')->with('success', 'Pelanggan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $db = DB::table("datapelanggan")->where('id', $id)->get();
        return view("DataMaster.datapelanggan.editpelanggan", ['db' => $db]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('datapelanggan')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'updated_at' => now()
        ]);

        return redirect('/datapelanggan')->with('success', 'Pelanggan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $db = DB::table("jenisbarang")->where("id", $id)->first();
        $db = DataPelanggan::findOrFail($id);
        $db->delete();

        return back()->with('success', 'Pelanggan ' . $db->nama . ' berhasil dihapus');
    }

    public function pdfpelanggan()
    {
        $db = DB::table('datapelanggan')->get();
        $pdf = pdf::loadview('DataMaster.datapelanggan.datapelanggan-pdf', compact('db'));
        return $pdf->stream('AppServis.pdf');
    }
}
