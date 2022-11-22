<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use App\Models\Matkul;
use App\Models\Tahunakademik;
use Illuminate\Http\Request;

class DashboardMahasiswaController extends Controller
{
    public function index()
    {
        return view('mahasiswa.index')->with([
            'jumlah_sks' => Matkul::all()->count(),
            'jumlah_matkul' => Mahasiswa::all()->count(),
            'jumlah_jadwal' => Jadwal::all()->count(),
        ]);
    }
}
