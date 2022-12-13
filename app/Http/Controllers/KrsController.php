<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Matkul;
use App\Models\Krs;
use App\Models\Jadwal;
use App\Models\TahunAkademik;
use Alert;

use Illuminate\Http\Request;

class KrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->session()->get('mahasiswa');
        $mahasiswa = Mahasiswa::findOrFail($data->id);
        $ta = TahunAkademik::where('status_tahunakademik', 1)->first();

        $items = Krs::where('fk_mahasiswa_krs', $mahasiswa->id)->where('fk_ta_krs', $ta->id)->with(['jadwal'])->get();

        $sumSks = 0;
        $maksSks = 24;
        foreach ($items as $item) {
            $sumSks = $sumSks + $item->jadwal->matkul->sks_matkul;
        }

        $dts = Nilai::where('fk_mahasiswa_nilai', $data->id)->where('fk_ta_nilai', $ta->id)->get();

        foreach ($dts as $index => $dt) {
            $dtId[] = $dt['fk_krs_nilai'];
        }

        foreach ($items as $index => $item) {
            $itemId[] = $item['id'];
        }
        
        // check perubahan data yang dari krs
        if (count($items) == count($dts)) {
            
        } else {
            if (count($dts) == 0) {
                foreach ($items as $index => $item) {
                    Nilai::create([
                        'fk_krs_nilai' => $item->id,
                        'fk_mahasiswa_nilai' => $item->fk_mahasiswa_krs,
                        'fk_jadwal_nilai' => $item->fk_jadwal_krs,
                        'fk_ta_nilai' => $item->fk_ta_krs,
                    ]);
                }
            } else {
                $results = array_diff($itemId, $dtId);
                foreach ($results as $result) {
                    $krsId[] = $result;
                }
                
                foreach ($krsId as $index => $id) {
                    $data = Krs::where('id', $id)->get();
                    
                    Nilai::create([
                        'fk_krs_nilai' => $data[0]->id,
                        'fk_mahasiswa_nilai' => $data[0]->fk_mahasiswa_krs,
                        'fk_jadwal_nilai' => $data[0]->fk_jadwal_krs,
                        'fk_ta_nilai' => $data[0]->fk_ta_krs,
                    ]);

                }
            }
            
        }

        return view('mahasiswa.krs.index')->with([
            'mahasiswa' => $mahasiswa,
            'ta' => $ta,
            'items' => $items,
            'sumSks' => $sumSks,
            'maksSks' => $maksSks,
        ]);
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // ambil session mahasiswa
        $mahasiswa = $request->session()->get('mahasiswa');

        // ambil tahun akademik aktif
        $ta = TahunAkademik::where('status_tahunakademik', 1)->first();

        // ambil jadwal yang sudah dimasukkan ke krs
        $krsMahasiswas = Krs::where('fk_mahasiswa_krs', $mahasiswa->id)->where('fk_ta_krs', $ta->id)->with(['jadwal'])->get();

        // ambil id dari jadwal yang sudah dimasukkan ke krs
        foreach($krsMahasiswas as $index => $krsMahasiswa){
            $idKrs[] = $krsMahasiswa->fk_jadwal_krs;
        }

        // ambil total sks krs mahasiswa
        $sumSks = 0;
        $maksSks = 24;
        foreach($krsMahasiswas as $item){ 
            $sumSks = $sumSks + $item->jadwal->matkul->sks_matkul;
        }

        // ambil seluruh jadwal
        $items = Jadwal::where('fk_ta_jadwal', $ta->id)->with(['matkul','ruangan','dosen'])->get();

        // ambil seluruh id jadwal
        foreach($items as $index => $item){
            $idJadwal[] = $item->id;
        }


        if(count($krsMahasiswas) == 0){
            $data = Jadwal::where('fk_ta_jadwal', $ta->id)->with(['matkul','ruangan','dosen'])->get();
        }else{
            $results = array_diff($idJadwal,$idKrs);
            foreach($results as $result){
                $datas[] = Jadwal::where('id', $result)->get();
            }
            foreach($datas as $item){
                $data[] = $item[0];
            }
        }

        return view('mahasiswa.krs.create')->with([
            'data' => $data,
            'mhsId' => $mahasiswa->id,
            'taId' => $ta->id,
            'sumSks' => $sumSks,
            'maksSks' => $maksSks,
        ]);
        
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        foreach ($data['matkul'] as $index => $item) {
            $jadwal[] = Jadwal::where('id', $item)->get();
        }
        // data matkul berdasarkan foreign key pada jadwal
        foreach ($jadwal as $index => $item) {
            $matkul[] = Matkul::where('id', $item[0]->fk_matkul_jadwal)->get();
        }
        // menghitung jumlah sks yang diambil
        $SKS = 0;
        foreach ($matkul as $index => $item) {
            $SKS = $SKS + $item[0]->sks_matkul;
        }
        // check apabila sks melebihi batas maksimal
        if ($data['sumSks'] + $SKS > $data['maksSks']) {
            return redirect()->route('krs.index')->with('error', 'Jumlah SKS Melebihi Batas Maksimal');
        } else {
            foreach ($data['matkul'] as $index => $value) {
                Krs::create([
                    'status_krs' => 'Aktif',
                    'fk_mahasiswa_krs' => $data['mhsId'],
                    'fk_jadwal_krs' => $data['matkul'][$index],
                    'fk_ta_krs' => $data['taId'],
                ]);
            }
            
            return redirect()->route('krs.index')->with('success', 'Data KRS Berhasil Ditambahkan!');
        }
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $ta = TahunAkademik::where('status_tahunakademik', 1)->first();

        $items = Krs::where('fk_mahasiswa_krs', $mahasiswa->id)->where('fk_ta_krs', $ta->id)->with(['jadwal'])->get();

        $sumSks = 0;
        $maksSks = 24;
        foreach ($items as $item) {
            $sumSks = $sumSks + $item->jadwal->matkul->sks_matkul;
        }

        return view('mahasiswa.krs.cetak')->with([
            'mahasiswa' => $mahasiswa,
            'ta' => $ta,
            'items' => $mahasiswa,
            'sumSks' => $mahasiswa,
            'maksSks' => $maksSks,
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
        //
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
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = Nilai::where('fk_krs_nilai', $id)->first();
        $item = Krs::findOrFail($id);
        $item->delete();
        $nilai->delete();
        
        return redirect()->route('krs.index')->with('success', 'Data KRS Berhasil Dihapus!');
    }
}
