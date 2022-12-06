<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip_dosen', 'nama_dosen', 'tmp_dosen', 'tgl_dosen', 'alamat_dosen', 'prodi_dosen', 'agama_dosen', 'telp_dosen', 'email_dosen', 'gender_dosen', 'foto_dosen'
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class,'fk_dosen_jadwal');
    }
    
}
