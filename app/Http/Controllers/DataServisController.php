<?php

namespace App\Http\Controllers;

use App\Mail\NotifikasiSelesaiServis;
use Illuminate\Http\Request;
use App\Models\DataServis;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DataServisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $db = DataServis::with(['datapelanggan', 'user', 'jenisbarang'])
            ->where('status', '=', 'Baru')
            ->get();

        $title = 'Delete!';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('DataServis.dataservis_baru', compact('db'));
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

    public function dataservisDiproses()
    {
        $db = DataServis::with(['datapelanggan', 'user', 'jenisbarang'])
            ->where('status', '=', 'Diproses')
            ->get();

        $title = 'Delete!';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('DataServis.dataservis_diproses', compact('db'));
    }

    public function dataservisSelesai()
    {
        $db = DataServis::with(['datapelanggan', 'user', 'jenisbarang'])
            ->where('status', '=', 'Selesai')
            ->get();

        $title = 'Delete!';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('DataServis.dataservis_selesai', compact('db'));
    }

    public function dataservisBatal()
    {
        $db = DataServis::with(['datapelanggan', 'user', 'jenisbarang'])
            ->where('status', '=', 'Batal')
            ->get();

        $title = 'Delete!';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('DataServis.dataservis_batal', compact('db'));
    }

    public function dataservisDiambil()
    {
        $db = DataServis::with(['datapelanggan', 'user', 'jenisbarang'])
            ->where('status', '=', 'Diambil')
            ->get();

        $title = 'Delete!';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('DataServis.dataservis_diambil', compact('db'));
    }

    public function updateStatus(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'status' => 'required|string|in:Baru,Diproses,Selesai,Batal,Diambil',
        ]);

        // Temukan record TandaTerima berdasarkan ID
        $dataServis = DataServis::findOrFail($id);

        // Update status
        if ($request->input('status') == 'Selesai') {
            // Jika status ingin diubah menjadi Selesai, arahkan ke input data tambahan
            return redirect()->route('add-data-servis', $dataServis->id);
        } elseif ($request->input('status') == 'Batal') {
            // Jika status ingin diubah menjadi Batal, arahkan ke form alasan pembatalan
            return redirect()->route('data_servis.tampilanPembatalan', $dataServis->id);
        } else {
            // Update status selain Selesai dan Batal
            $dataServis->status = $request->input('status');
            $dataServis->save();
        }

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Status berhasil diubah!');
    }

    public function tampilanPembatalan($id)
    {
        $dataServis = DataServis::findOrFail($id);
        return view('DataServis.alasan_batal', compact('dataServis'));
    }

    public function storePembatalan(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'alasan_pembatalan' => 'required|string|max:255',
            'status' => 'required|string|in:Baru,Diproses,Selesai,Batal,Diambil',
        ]);

        // Temukan record DataService berdasarkan ID
        $dataServis = DataServis::findOrFail($id);

        // Simpan alasan pembatalan dan status
        $dataServis->status = $request->input('status');
        $dataServis->alasan_pembatalan = $request->input('alasan_pembatalan');
        $dataServis->save();

        // Redirect dengan pesan sukses ke tampilan status Batal
        return redirect()->route('dataservis.batal')->with('success', 'Servis berhasil dibatalkan!');
    }

    public function servisSelesai($id)
    {
        // Temukan record TandaTerima berdasarkan ID
        $dataServis = DataServis::with('datapelanggan', 'user', 'jenisbarang', 'transaksi')->findOrFail($id);

        // Update status menjadi Selesai
        $dataServis->status = 'Selesai';
        $dataServis->save();

        // Redirect dengan pesan sukses
        return redirect()->route('dataservis.selesai')->with('success', 'Status berhasil diubah menjadi Selesai!');
    }

    public function addItemDataServis($id)
    {
        $dataservisID = DataServis::with('datapelanggan', 'user', 'jenisbarang', 'transaksi')->findOrFail($id);
        $barangjasa = DB::table('barangdanjasa')->get();
        $addBarangJasa = Transaksi::with('pelanggan', 'dataServis', 'barangJasa')
            ->where('dataservis_id', '=', $dataservisID->id)
            ->get();
        return view('DataServis.add_dataservis', compact('dataservisID', 'barangjasa', 'addBarangJasa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $db = DB::table("data_servis")->where('id', $id)->get();
        $datapelanggan = DB::table("datapelanggan")->get();
        $user = DB::table("users")->where('role_id', 2)->get();
        $jenisbarang = DB::table("jenisbarang")->get();
        return view("DataServis.edit_dataservis", ['db' => $db, 'datapelanggan' => $datapelanggan, 'user' => $user, 'jenisbarang' => $jenisbarang]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table("data_servis")->where('id', $request->id)->update([
            'pelanggan_id' => $request->pelanggan_id,
            'teknisi_id' => $request->teknisi_id,
            'jenis_barang_id' => $request->jenis_barang_id,
            'kerusakan' => $request->kerusakan,
            'tipe' => $request->tipe,
            'kelengkapan' => $request->kelengkapan,
            'serial_number' => $request->serial_number,
            'catatan' => $request->catatan,
            'kasir' => Auth::user()->nama,
            'alasan_pembatalan' => $request->alasan_pembatalan,
        ]);

        return redirect('/dataservis/status/baru')->with('success', 'Data berhasil diupdate');
    }

    public function kirimEmail($id)
    {
        // Memuat relasi datapelanggan
        $dataservis = DataServis::with('datapelanggan')->find($id);

        // Periksa apakah pelanggan ada
        $datapelanggan = $dataservis->datapelanggan; // Menggunakan relasi 'datapelanggan'

        if (!$datapelanggan || !$datapelanggan->email) {
            return back()->with('error', 'Email pelanggan tidak ditemukan.');
        }

        // Kirim email notifikasi ke pelanggan
        Mail::to($datapelanggan->email)->send(new NotifikasiSelesaiServis($datapelanggan, $dataservis));

        return back()->with('success', 'Email notifikasi berhasil dikirim kepada pelanggan!');
    }



    public function pdfDataServis(Request $request)
    {
        // Ambil status dari request, jika tidak ada default ke 'Baru'
        $status = $request->input('status', ['Baru']);

        // Ambil data dengan status yang sesuai
        $db = DataServis::with('datapelanggan', 'user', 'jenisbarang')
            ->whereIn('status', $status)
            ->get();

        // Muat view dan pass data ke dalamnya
        $pdf = Pdf::loadView('DataServis.pdf_dataservis', compact('db', 'status'));

        // Menghasilkan dan menampilkan PDF
        return $pdf->stream('DataServis-' . implode('-', $status) . '.pdf');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("data_servis")->where("id", $id)->delete();

        return back()->with('success', 'Data Servis berhasil dihapus');
    }
}
