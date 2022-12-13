<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Nilai;
use App\Models\Jadwal;
use App\Models\Krs;
use App\Models\TahunAkademik;
use DateTime;
use PDF;
use Alert;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Nilai::where('fk_jadwal_nilai', $id)->with('mahasiswa')->get();

        $jadwal = Jadwal::findOrFail($id);
        $ta = TahunAkademik::where('status_tahunakademik', 1)->first();

        return view('dosen.nilai.show')->with([
            'id' => $id,
            'items' => $items,
            'jadwal' => $jadwal,
            'ta' => $ta,
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Nilai::where('fk_jadwal_nilai', $id)->with('mahasiswa')->get();
    
        $jadwal = Jadwal::findOrFail($id);
        $ta = TahunAkademik::where('status_tahunakademik', 1)->first();
    
        return view('dosen.nilai.edit')->with([
            'id' => $id,
            'items' => $items,
            'jadwal' => $jadwal,
            'ta' => $ta,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        Nilai::where('fk_mahasiswa_nilai', $id)->where('fk_jadwal_nilai', $id)->update([
            'skor_nilai' => $data['skor_nilai'],
        ]);
        
        return redirect()->route('nilai.show', $id)->with('success', 'Data Nilai Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display a listing nilai of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function listNilai(Request $request)
    {   
        // ambil data dosen sesuai session dan ambil tahun akademiknya
        $dosen = $request->session()->get('dosen');
        $ta = TahunAkademik::where('status_tahunakademik', 1)->first();

        // ambil data jadwal sesuai dengan dosen dan tahun akademiknya
        $datas = Jadwal::where('fk_dosen_jadwal', $dosen->id)->where('fk_ta_jadwal', $ta->id)->with('matkul')->get();

        return view('dosen.nilai.index')->with([
            'datas' => $datas,
        ]);

    }

    /**
     * Display a export KHS to PDF of the resource Mahasiswa.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function KHS_NFComputer(Request $request)
    {
        $mahasiswa = $request->session()->get('mahasiswa');
        $ta = TahunAkademik::where('status_tahunakademik', 1)->first();

        $nilais = Nilai::where('fk_mahasiswa_nilai', $mahasiswa->id)->where('fk_ta_nilai', $ta->id)->get();

        $sumSks = 0;
        $sumBobot = 0;
        foreach ($nilais as $index => $nilai) {
            // hitung jumlah sks
            $sumSks += $nilai->jadwal->matkul->sks_matkul;

            // hitung jumlah bobot
            $bobot = $nilai->skor_nilai * $nilai->jadwal->matkul->sks_matkul;
            $sumBobot += $bobot;
            
        }

        // ambil tanggal sekarang
        $date = new DateTime('now');
        $tanggal = $date->format('d F Y');

        return view('mahasiswa.khs.pdf')->with([
            'ta' => $ta,
            'tanggal' => $tanggal,
            'mahasiswa' => $mahasiswa,
            'nilais' => $nilais,
            'sumSks' => $sumSks,
            'sumBobot' => $sumBobot,
        ]);

        // $data = [
        //     'ta' => $ta,
        //     'tanggal' => $tanggal,
        //     'mahasiswa' => $mahasiswa,
        //     'nilais' => $nilais,
        //     'sumSks' => $sumSks,
        //     'sumBobot' => $sumBobot,
        // ];

        // $pdf = PDF::loadView('mahasiswa.khs.pdf', $data)->setOptions([['dpi' => 600, 'defaultFont' => 'sans-serif']]);

        // return $pdf->download("KHS-$mahasiswa->nim_mahasiswa-NFComputer.pdf");
    }
}
