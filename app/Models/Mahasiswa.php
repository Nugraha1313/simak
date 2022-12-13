<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim_mahasiswa', 'nama_mahasiswa', 'tmp_mahasiswa', 'tgl_mahasiswa', 'alamat_mahasiswa', 'prodi_mahasiswa', 'agama_mahasiswa', 'telp_mahasiswa', 'email_mahasiswa', 'gender_mahasiswa', 'foto_mahasiswa'
    ];

    public function nilai()
    {
        return $this->hasMany(Nilai::class,'fk_mahasiswa_nilai');
    }


}
