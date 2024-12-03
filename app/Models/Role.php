<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = [
        'nama',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    // public function tandaterima()
    // {
    //     return $this->hasMany(TandaTerima::class);
    // }
}
