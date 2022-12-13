<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_matkul', 'nama_matkul', 'sks_matkul', 'ket_matkul'
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class,'fk_matkul_jadwal');
    }
}
