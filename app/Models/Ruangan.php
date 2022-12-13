<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_ruangan'
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class,'fk_ruangan_jadwal');
    }
}
