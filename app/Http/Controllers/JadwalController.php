<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Jadwal;
use App\Models\Dosen;
use App\Models\Matkul;
use App\Models\Ruangan;
use App\Http\Requests\JadwalRequest;
use App\Models\TahunAkademik;
use Symfony\Component\VarDumper\VarDumper;
use Alert;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun = TahunAkademik::where('status_tahunakademik', '=', 1)->first();
        // VarDumper::dump($tahun);
        $items = Jadwal::with(['matkul', 'dosen', 'ruangan'])->get();
        // $items = Jadwal::with(['matkul', 'dosen', 'ruangan', 'tahun'])->get();

        return view('admin.kurikulum.index')->with([
            'items' => $items,
            'tahun' => $tahun
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matkul = Matkul::all();
        $dosen = Dosen::all();
        $ruangan = Ruangan::all();
        $tahun = TahunAkademik::where('status_tahunakademik', '=', 1)->first();
        // VarDumper::dump($tahun);
        $haris = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

        return view('admin.kurikulum.create')->with([
            'matkul' => $matkul,
            'dosen' => $dosen,
            'ruangan' => $ruangan,
            'haris' => $haris,
            'tahun' => $tahun
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JadwalRequest $request)
    {
        $data = $request->all();
        Jadwal::create($data);
        return redirect()->route('kurikulum.index')->with('success', 'Data Kurikulum Berhasil Ditambahkan!');
        // return redirect('kurikulum.index')->with('status', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Jadwal::with(['matkul', 'dosen', 'ruangan'])->findOrFail($id);
        $tahun = TahunAkademik::where('status_tahunakademik', '=', 1)->first();
        $matkul = Matkul::all();
        $dosen = Dosen::all();
        $ruangan = Ruangan::all();
        $haris = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

        return view('admin.kurikulum.edit')->with([
            'item' => $item,
            'matkul' => $matkul,
            'dosen' => $dosen,
            'ruangan' => $ruangan,
            'haris' => $haris,
            'tahun' => $tahun
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JadwalRequest $request, $id)
    {
        $data = $request->all();

        $item = Jadwal::findorfail($id);
        $item->update($data);
        // return redirect('kurikulum.index')->with('status', 'Data berhasil diubah!');
        return redirect()->route('kurikulum.index')->with('success', 'Data Kurikulum Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Jadwal::findorfail($id);
        $item->delete();
        return redirect()->route('kurikulum.index')->with('success', 'Data Kurikulum Berhasil Dihapus!');
        // return redirect('kurikulum.index')->with('status', 'Data berhasil dihapus!');
    }
}