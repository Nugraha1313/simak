<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Nilai;
use App\Models\Jadwal;
use App\Models\Krs;
use App\Models\TahunAkademik;
use DateTime;

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
        $items = Nilai::where('fk_jadwal_nilai', $id)->with('mahasiswas')->get();

        $jadwal = Jadwal::findOrfail($id);
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
        $items = Nilai::where('fk_jadwal_nilai', $id)->with('mahasiswas')->get();
    
        $jadwal = Jadwal::findOrfail($id);
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
        
        return redirect()->route('nilai.show')->with('status', 'Nilai berhasil ditambahkan');
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
     * Display a KHS of the resource Mahasiswa.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function khs(Request $request)
    {
        $mahasiswa = $request->session()->get('mahasiswa');
        $ta = TahunAkademik::where('status_tahunakademik', 1)->first();

        $nilais = Nilai::where('fk_mahasiswa_nilai', $id)->where('fk_ta_nilai', $id)->get();

        $sumSks = 0;
        $sumBobot = 0;

        


    }
}
