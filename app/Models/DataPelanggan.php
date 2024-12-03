<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPelanggan extends Model
{
    use HasFactory;

    protected $table = 'datapelanggan';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = [
        'nama',
        'no_telepon',
        'email',
        'alamat',
    ];

    public function dataServis()
    {
        return $this->hasMany(DataServis::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
