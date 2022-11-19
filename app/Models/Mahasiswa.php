<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    //mapping table
    protected $table = 'mahasiswas';
    //mapping ke field
    protected $fillable = ['id_mahasiswa', 'nim_mahasiswa', 'prodi', 'nama_mahasiswa', 'tmp_mahasiswa', 'tgl_mahasiswa', 'alamat_mahasiswa', 'agama_mahasiswa', 'telp_mahasiswa', 'email_mahasiswa', 'gender_mahasiswa', 'foto_mahasiswa', 'fk_krs_mahasiswa'];
}
