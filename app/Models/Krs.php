<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    use HasFactory;
    protected $table = 'krs';
    protected $guarded = ['id_krs'];

    // TAHUN AKADEMIK
    public function tahunakademik()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo(Tahunakademik::class, 'fk_ta_jadwal', 'id_tahunakademik');
    }

    // JADWAL
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}
