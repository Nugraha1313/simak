<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use App\Models\Tahunakademik;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function index()
    {
        return view('admin.index')->with([
            'jumlah_mahasiswa' => Mahasiswa::all()->count(),
            'jumlah_dosen' => Dosen::all()->count(),
            'jumlah_kurikulum' => Jadwal::all()->count(),
            'jumlah_tahunakademik' => Tahunakademik::all()->count(),
        ]);
    }
}
