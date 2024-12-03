<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory;

    protected $table = 'jenisbarang';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = [
        'nama',
    ];

    public function dataServis()
    {
        return $this->hasMany(DataServis::class);
    }
}
