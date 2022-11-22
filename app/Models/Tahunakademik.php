<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahunakademik extends Model
{
    use HasFactory;
    protected $table = 'tahunakademiks';
    protected $guarded = ['id_tahunakademik'];

    // KRS
    public function krs()
    {
        return $this->hasMany('App\Models\Krs');
    }
}
