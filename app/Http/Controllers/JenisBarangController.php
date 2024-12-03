<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $db = DB::table('jenisbarang')->get();

        $title = 'Delete!';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('DataMaster.jenisbarang.jenisbarang', compact('db'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('DataMaster.jenisbarang.addjenisbarang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        DB::table("jenisbarang")->insert([
            'nama' => $request->nama,
        ]);
        return redirect('/jenisbarang')->with('success', 'Jenis Barang berhasil ditambahkan');
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
        $db = DB::table("jenisbarang")->where('id', $id)->get();
        return view("DataMaster.jenisbarang.editjenisbarang", ['db' => $db]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('jenisbarang')->where('id', $request->id)->update([
            'nama' => $request->nama,
        ]);
        return redirect('/jenisbarang')->with('success', 'Jenis Barang berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $db = DB::table("jenisbarang")->where("id", $id)->first();
        DB::table("jenisbarang")->where("id", $id)->delete();

        return back()->with('success', 'Jenis Barang ' . $db->nama . ' berhasil dihapus');
    }

    public function pdfjenisbarang()
    {
        $db = DB::table('jenisbarang')->get();
        $pdf = pdf::loadview('DataMaster.jenisbarang.jenisbarang-pdf', compact('db'));
        return $pdf->stream('AppServis.pdf');
    }
}
