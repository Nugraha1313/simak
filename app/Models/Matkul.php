<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;
    protected $table = 'matkuls';
    protected $guarded = ['id_matkul'];

    // JADWAL
    public function jadwal()
    {
        return $this->hasOne('App\Models\Jadwal');
    }

    // public function jadwalKrs()
    // {
    //     return $this->hasOneThrough(
    //         Krs::class,
    //         Jadwal::class,
    //         'fk_jadwal_krs', // Foreign key on the cars table...
    //         'fk_matkul_jadwal', // Foreign key on the owners table...
    //         'id_matkul', // Local key on the mechanics table...
    //         'id_jadwal' // Local key on the cars table...
    //     );
    // }
}
