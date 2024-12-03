<?php

namespace App\Http\Controllers;

use App\Models\DataServis;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function laporanServis(Request $request)
    {
        // Ambil tanggal dari request
        $dari = $request->input('dari');
        $sampai = $request->input('sampai');

        // Ambil data service yang selesai antara tanggal dari dan sampai
        if ($dari && $sampai) {
            // Mengambil data yang dikelompokkan
            $data = DataServis::select(DB::raw('DATE(updated_at) as tanggal'), DB::raw('COUNT(*) as datapelanggan'))
                ->whereBetween('created_at', [$dari, $sampai])
                ->where('status', 'Diambil')
                ->groupBy(DB::raw('DATE(updated_at)')) // Mengelompokkan berdasarkan tanggal (DATE)
                ->get();

            $noDataMessage = $data->isEmpty() ? 'Tidak ada data servis yang tersedia untuk rentang tanggal yang dipilih.' : null;
        } else {
            $data = collect(); // Kosongkan data jika tanggal tidak diisi
            $noDataMessage = 'Silakan pilih rentang tanggal untuk menampilkan laporan.';
        }

        return view('Laporan.laporan_servis', compact('data', 'dari', 'sampai', 'noDataMessage'));
    }

    public function pdf_laporan_Servis(Request $request)
    {
        $dari = $request->input('dari');
        $sampai = $request->input('sampai');

        $data = DataServis::select(DB::raw('DATE(updated_at) as tanggal'), DB::raw('COUNT(*) as datapelanggan'))
            ->whereBetween('created_at', [$dari, $sampai])
            ->where('status', 'Diambil')
            ->groupBy(DB::raw('DATE(updated_at)'))
            ->get();

        $pdf = PDF::loadView('Laporan.pdf_servis', compact('data', 'dari', 'sampai'));
        return $pdf->stream('LaporanServis.pdf');
    }


    public function laporanPerTeknisi(Request $request)
    {
        $dari = $request->input('dari');
        $sampai = $request->input('sampai');

        if ($dari && $sampai) {
            $data = DataServis::select(
                'teknisi_id',
                DB::raw('COUNT(*) as datapelanggan')
            )
                ->with('user') // Mengambil data teknisi
                ->whereBetween('created_at', [$dari, $sampai])
                ->where('status', 'Diambil')
                ->groupBy('teknisi_id')
                ->get();

            $noDataMessage = $data->isEmpty() ? 'Tidak ada data teknisi yang tersedia untuk rentang tanggal yang dipilih.' : null;
        } else {
            $data = collect();
            $noDataMessage = 'Silakan pilih rentang tanggal untuk menampilkan laporan.';
        }

        return view('Laporan.laporan_perteknisi', compact('data', 'dari', 'sampai', 'noDataMessage'));
    }

    public function pdf_laporan_PerTeknisi(Request $request)
    {
        $dari = $request->input('dari');
        $sampai = $request->input('sampai');

        $data = DataServis::select(
            'teknisi_id',
            DB::raw('COUNT(*) as datapelanggan')
        )
            ->with('user') // Mengambil data teknisi
            ->whereBetween('created_at', [$dari, $sampai])
            ->where('status', 'Diambil')
            ->groupBy('teknisi_id')
            ->get();

        $pdf = Pdf::loadview('Laporan.pdf_perteknisi', compact('data', 'dari', 'sampai'));
        return $pdf->stream('LaporanTeknisi.pdf');
    }


    public function laporanTransaksi(Request $request)
    {
        $dari = $request->input('dari');
        $sampai = $request->input('sampai');

        // Ambil data service yang statusnya 'Selesai'
        // $dataService = DataService::where('status', 'Diambil')->get();

        // Inisialisasi $total dengan nilai 0
        $total = 0;

        if ($dari && $sampai) {
            $data = Transaksi::with('barangJasa')
                ->select(
                    'created_at',
                    'barang_jasa_id',
                    'qty'
                )
                ->whereBetween('created_at', [$dari, $sampai])
                ->get();

            // Hitung total biaya dari transaksi
            $total = $data->sum(function ($item) {
                return $item->barangJasa->harga_jual * $item->qty;
            });

            $noDataMessage = $data->isEmpty() ? 'Tidak ada data transaksi yang tersedia untuk rentang tanggal yang dipilih.' : null;
        } else {
            $data = collect();
            $noDataMessage = 'Silakan pilih rentang tanggal untuk menampilkan laporan.';
        }

        // Kirimkan variabel $total ke view
        return view('laporan.laporan_transaksi', compact('data', 'dari', 'sampai', 'total', 'noDataMessage'));
    }

    public function pdf_laporan_Transaksi(Request $request)
    {
        $dari = $request->input('dari');
        $sampai = $request->input('sampai');

        $data = Transaksi::with('barangJasa')
            ->select(
                'created_at',
                'barang_jasa_id',
                'qty'
            )
            ->whereBetween('created_at', [$dari, $sampai])
            ->get();

        $total = $data->sum(function ($item) {
            return $item->barangJasa->harga_jual * $item->qty;
        });

        $pdf = Pdf::loadView('laporan.pdf_transaksi', compact('data', 'dari', 'sampai', 'total'));
        return $pdf->stream('LaporanTransaksi.pdf');
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
        //
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
