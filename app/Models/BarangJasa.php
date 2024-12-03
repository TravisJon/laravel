<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangJasa extends Model
{
    use HasFactory;

    protected $table = 'barangdanjasa';

    protected $fillable =
    [
        'nama',
        'tipe',
        'harga_jual',
        'gambar',
        'stok',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
