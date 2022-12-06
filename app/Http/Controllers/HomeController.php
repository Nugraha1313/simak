<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Matkul;
use App\Models\Jadwal;
use App\Models\TahunAkademik;
use App\Models\Nilai;
use App\Models\Krs;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard Administrator.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboardAdministrator()
    {
        $mahasiswa = Mahasiswa::count();
        $dosen = Dosen::count();
        $jadwal = Jadwal::count();
        $ta = TahunAkademik::count();

        return view('admin.index')->with([
            'mahasiswa' => $mahasiswa,
            'dosen' => $dosen,
            'jadwal' => $jadwal,
            'ta' => $ta,
        ]);
    }

    /**
     * Show the application dashboard Mahasiswa.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboardMahasiswa(Request $request)
    {
        $mahasiswa = $request->session()->get('mahasiswa');
        $ta = TahunAkademik::where('status_tahunakademik', 1)->first();
        // cari jumlah sks
        $items = Krs::where('fk_mahasiswa_krs', $mahasiswa->id)->where('fk_ta_krs', $ta->id)->with(['jadwal'])->get();
        $sumSks = 0;
        foreach ($items as $item) {
            $sumSks = $sumSks + $item->jadwal->matkul->sks_matkul;
        }
        $matkul = Matkul::count();
        $kurikulum = Jadwal::count();

        return view('mahasiswa.index')->with([
            'sumSks' => $sumSks,
            'matkul' => $matkul,
            'kurikulum' => $kurikulum,
        ]);
    }

    /**
     * Show the application dashboard Dosen.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboardDosen(Request $request)
    {
        $dosen = $request->session()->get('dosen');
        $ta = TahunAkademik::where('status_tahunakademik', 1)->first();
        
        $items = Jadwal::where('fk_dosen_jadwal', $dosen->id)->where('fk_ta_jadwal', $ta->id)->with(['matkul'])->get();
        $sumMatkul = 0;
        foreach ($items as $item) {
            $sumMatkul = $sumMatkul + $item->jadwal->matkul->count();
        }

        return view('dosen.index')->with([
            'sumMatkul' => $sumMatkul,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
