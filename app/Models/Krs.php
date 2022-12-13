<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_krs', 'fk_ta_krs', 'fk_mahasiswa_krs',  'fk_jadwal_krs'
    ];

    public function ta()
    {
        return $this->belongsTo(TahunAkademik::class, 'fk_ta_krs', 'id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'fk_mahasiswa_krs', 'id');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'fk_jadwal_krs', 'id');
    }
}
