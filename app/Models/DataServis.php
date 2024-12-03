<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataServis extends Model
{
    use HasFactory;

    protected $table = 'data_servis';

    protected $fillable = [
        'pelanggan_id',
        'teknisi_id',
        'jenis_barang_id',
        'kasir',
        'kerusakan',
        'tipe',
        'kelengkapan',
        'serial_number',
        'catatan',
        'status',
        'alasan_pembatalan',
    ];

    public function datapelanggan()
    {
        return $this->belongsTo(DataPelanggan::class, 'pelanggan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'teknisi_id');
    }

    public function jenisbarang()
    {
        return $this->belongsTo(JenisBarang::class, 'jenis_barang_id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'dataservis_id');
    }
}
