<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwals';
    protected $guarded = ['id_jadwal'];

    // RUANGAN
    public function ruangan()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo(Ruangan::class, 'fk_ruangan_jadwal', 'id_ruangan');
    }

    // DOSEN
    public function dosen()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo(Dosen::class, 'fk_dosen_jadwal', 'id_dosen');
    }

    // MATKUL
    public function matkul()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo(Matkul::class, 'fk_matkul_jadwal', 'id_matkul');
    }

    // KRS
    public function krs()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo(Krs::class, 'fk_krs_jadwal', 'id_krs');
    }
}
