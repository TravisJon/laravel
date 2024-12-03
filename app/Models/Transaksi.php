<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable =
    [
        'pelanggan_id',
        'dataservis_id',
        'barang_jasa_id',
        'qty',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(DataPelanggan::class, 'pelanggan_id');
    }

    public function dataServis()
    {
        return $this->belongsTo(DataServis::class, 'dataservis_id');
    }

    public function barangJasa()
    {
        return $this->belongsTo(BarangJasa::class, 'barang_jasa_id');
    }
}
