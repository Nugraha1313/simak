<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{ 
    use HasFactory;
    //maping ke table
    protected $table = 'dosens';
    //mapping ke kolom atau fieldnya
    protected $fillable = ['id_dosen', 'nip_dosen', 'nama_dosen', 'tmp_dosen', 'tgl_dosen', 'alamat_dosen', 'agama_dosen', 'email_dosen', 'gender_dosen', 'foto_dosen', 'prodi'];
}
