<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'fk_matkul_jadwal', 'hari_jadwal', 'waktu_jadwal', 'fk_dosen_jadwal', 'fk_ruangan_jadwal', 'fk_ta_jadwal'
    ];

    public function matkul()
    {
        return $this->belongsTo(Matkul::class,'fk_matkul_jadwal','id');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class,'fk_ruangan_jadwal','id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class,'fk_dosen_jadwal','id');
    }
    
    public function krs()
    {
        return $this->hasMany(Krs::class,'fk_jadwal_krs');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class,'fk_jadwal_nilai');
    }
}
