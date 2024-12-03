<?php

namespace App\Http\Controllers;

use App\Models\BarangJasa;
use App\Models\DataServis;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $db = DataServis::with('datapelanggan', 'user', 'jenisbarang', 'transaksi')
            ->where('status', 'Diambil')
            ->get();

        $title = 'Delete!';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('Transaksi.riwayat_transaksi', compact('db'));
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
    public function store(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'barang_jasa_id' => 'required|exists:barangdanjasa,id',
        ]);

        $servisID = DataServis::with('datapelanggan', 'user', 'jenisbarang', 'transaksi')->find($id);
        $barangJasa = BarangJasa::find($request->barang_jasa_id);

        // Periksa apakah item adalah barang atau jasa
        if ($barangJasa->tipe === 'Barang') {
            // Pastikan stok mencukupi sebelum menambahkan ke transaksi
            if ($barangJasa->stok <= 0) {
                return redirect()->back()->with('error', 'Stok barang tidak mencukupi!');
            }
        }

        // Cek apakah item sudah ada dalam transaksi
        $existingItem = Transaksi::where('dataservis_id', $servisID->id)
            ->where('barang_jasa_id', $request->barang_jasa_id)
            ->first();

        if ($existingItem) {
            // Jika item sudah ada, tambahkan qty
            $existingItem->qty += 1; // Tambahkan qty
            $existingItem->save();
        } else {
            // Jika belum ada, buat entri baru dengan qty 1
            Transaksi::create([
                'pelanggan_id' => $servisID->pelanggan_id,
                'dataservis_id' => $servisID->id,
                'barang_jasa_id' => $request->barang_jasa_id,
                'qty' => 1, // Default qty 1
            ]);
        }

        // Kurangi stok jika item adalah barang
        if ($barangJasa->tipe === 'Barang') {
            $barangJasa->stok -= 1; // Kurangi stok
            $barangJasa->save();
        }

        return redirect()->back()->with('success', 'Barang/Jasa berhasil ditambahkan.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function pdfTransaksi()
    {
        // Ambil semua data transaksi dari database
        $db = DataServis::with(['datapelanggan', 'user', 'jenisbarang', 'transaksi'])
            ->where('status', 'Diambil')
            ->get();

        // Menggunakan library PDF untuk membuat PDF dari view 'Transaksi.pdf_riwayat'
        $pdf = Pdf::loadview('Transaksi.pdf_riwayat', compact('db'));

        // Mengembalikan file PDF sebagai stream (ditampilkan di browser)
        return $pdf->stream('AppServis.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete_BarangJasa(string $id)
    {
        $data = Transaksi::findOrFail($id);
        $data->delete();

        return redirect()->back();
    }

    public function destroy(string $id)
    {
        DB::table("data_servis")->where("id", $id)->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
