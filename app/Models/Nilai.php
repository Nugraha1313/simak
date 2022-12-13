<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = [
        'skor_nilai', 'fk_krs_nilai', 'fk_mahasiswa_nilai', 'fk_jadwal_nilai', 'fk_ta_nilai'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'fk_mahasiswa_nilai', 'id');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'fk_jadwal_nilai', 'id');
    }
}
