<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    protected $table = 'ruangans';
    protected $guarded = ['id_ruangan'];

    // JADWAL
    public function jadwals()
    {
        return $this->hasMany('App\Models\Jadwal');
    }
}
