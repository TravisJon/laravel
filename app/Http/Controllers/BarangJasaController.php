<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class BarangJasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $db = DB::table('barangdanjasa')->get();

        $title = 'Delete!';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('DataMaster.barangdanjasa.barangjasa', compact('db'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('DataMaster.barangdanjasa.addbarangjasa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipe' => 'required|in:Barang,Jasa',
            'stok' => 'nullable|numeric|required_if:tipe,Barang',
        ], [
            'stok.required_if' => 'Silakan masukkan stok untuk barang!',  // Pesan kustom untuk stok
        ]);

        $imagename = null;

        if ($request->hasFile('gambar')) {
            $imagename = time() . '.' . $request->gambar->extension();
            $request->gambar->storeAs('/public/barangdanjasa', $imagename);
        }

        DB::table("barangdanjasa")->insert([
            'nama' => $request->nama,
            'tipe' => $request->tipe,
            'harga_jual' => $request->harga_jual,
            'gambar' => $imagename,
            'stok' => $request->tipe === 'Barang' ? $request->stok : null, // Simpan stok hanya jika tipe 'Barang'

        ]);

        return redirect('/barangjasa')->with('success', $request->tipe . ' berhasil ditambahkan');
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
        $data = DB::table("barangdanjasa")->where('id', $id)->first();

        if (!$data) {
            return redirect()->route('barangjasa')->with('error', 'Data tidak ditemukan');
        }

        return view("DataMaster.barangdanjasa.editbarangjasa", ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tipe' => 'required|in:Barang,Jasa',
            'stok' => 'nullable|numeric|required_if:tipe,Barang',
        ], [
            'stok.required_if' => 'Silakan masukkan stok untuk barang!',
        ]);

        $imagename = null;

        if ($request->hasFile('gambar')) {
            $imagename = time() . '.' . $request->gambar->extension();
            $request->gambar->storeAs('public/barangdanjasa', $imagename);
        }

        DB::table('barangdanjasa')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'tipe' => $request->tipe,
            'harga_jual' => $request->harga_jual,
            'gambar' => $imagename,
            'stok' => $request->tipe === 'Barang' ? $request->stok : null,
        ]);

        return redirect('/barangjasa')->with('success', $request->tipe . ' berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $db = DB::table("barangdanjasa")->where("id", $id)->first();
        DB::table("barangdanjasa")->where("id", $id)->delete();

        return back()->with('success', 'Data ' . $db->tipe . ' berhasil dihapus');
    }

    public function pdfbarangjasa()
    {
        $db = DB::table('barangdanjasa')->get();
        $pdf = pdf::loadview('DataMaster.barangdanjasa.barangjasa-pdf', compact('db'));
        return $pdf->stream('AppServis.pdf');
    }
}
