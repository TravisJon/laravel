<?php

namespace App\Http\Controllers;

use App\Models\BarangJasa;
use App\Models\DataServis;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PengambilanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua service yang statusnya 'Selesai'
        $services = DataServis::where('status', 'Selesai')->get();

        // Kembalikan ke view dengan data services
        return view('Transaksi.pengambilan', ['services' => $services]);
    }

    public function addPengambilan(Request $request)
    {
        // Validasi request
        $request->validate([
            'pelanggan_id' => 'required|exists:data_servis,id',
        ]);

        $services = DataServis::where('status', 'Selesai')->get();

        // Ambil data service berdasarkan ID
        $dataservisID = DataServis::with('datapelanggan', 'user', 'jenisbarang', 'transaksi')->find($request->pelanggan_id);

        // Ambil semua item barang/jasa
        $barangjasa = BarangJasa::all();

        $addBarangJasa = Transaksi::with('pelanggan', 'dataServis', 'barangJasa')
            ->where('dataservis_id', '=', $dataservisID->id)
            ->get();

        if (!$dataservisID) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        return view('Transaksi.add_pengambilan', [
            'dataservisID' => $dataservisID,
            'barangjasa' => $barangjasa,
            'services' => $services,
            'addBarangJasa' =>  $addBarangJasa,
        ]);
    }

    public function notaTransaksi(Request $request)
    {
        // Ambil data service berdasarkan ID
        $dataservisID = DataServis::with('datapelanggan', 'jenisbarang')->findOrFail($request->id);

        // Ambil semua item barang/jasa yang terkait dengan transaksi
        $transaksi = Transaksi::where('dataservis_id', $dataservisID->id)
            ->with('barangJasa')
            ->get();

        // Hitung total biaya
        $total = $transaksi->sum(function ($item) {
            return $item->barangJasa->harga_jual * $item->qty;
        });

        // Proses penyimpanan transaksi selesai (misalnya, ubah status)
        $dataservisID->status = 'Diambil';
        $dataservisID->save();

        // Kembalikan view nota transaksi
        return view('Transaksi.nota_transaksi', [
            'dataservisID' => $dataservisID,
            'transaksi' => $transaksi,
            'total' => $total,
        ]);
    }

    public function cetakNota($id)
    {
        $dataservisID = DataServis::findOrFail($id); // Ambil data service berdasarkan ID
        $transaksi = Transaksi::where('dataservis_id', $id)->get(); // Ambil data transaksi
        $total = $transaksi->sum(function ($item) {
            return $item->barangJasa->harga_jual * $item->qty;
        });

        // Menampilkan tampilan cetak, langsung membuka dialog print di browser
        return view('Transaksi.cetak_nota', compact('dataservisID', 'transaksi', 'total'));

        // // Load view untuk PDF dan passing data
        // $pdf = PDF::loadView('Transaksi.cetak_nota', compact('dataservisID', 'transaksi', 'total'));

        // // Return download PDF
        // return $pdf->stream('InvoiceServis.pdf');
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
        $request->validate([
            'pelanggan_id' => 'required|exists:data_servis,id',
            'barang_jasa_id' => 'required|exists:barang_jasa,id',
        ]);

        $servisID = DataServis::with('datapelanggan', 'user', 'jenisbarang', 'transaksi')->where('id', $request->dataservis_id);

        Transaksi::create([
            'pelanggan_id' => $servisID->pelanggan_id,
            'dataservis_id' => $servisID->id,
            'barang_jasa_id' => $request->barang_jasa_id,
            'qty' => 1, // Default qty 1
        ]);

        return redirect()->back();
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
