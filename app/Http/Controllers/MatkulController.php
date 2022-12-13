<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Matkul;
use App\Http\Requests\MatkulRequest;
use Alert;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Matkul::all();

        return view('admin.matkul.index')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.matkul.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatkulRequest $request)
    {
        $data = $request->all();

        Matkul::create([
            'kode_matkul' => $data['kode_matkul'],
            'nama_matkul' => $data['nama_matkul'],
            'sks_matkul' => $data['sks_matkul'],
            'ket_matkul' => $data['ket_matkul'],
        ]);

        return redirect()->route('mata-kuliah.index')->with('success', 'Data Mata Kuliah Berhasil Ditambahkan!');
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
        $item = Matkul::findOrFail($id);

        return view('admin.matkul.edit')->with([
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MatkulRequest $request, $id)
    {
        $data = $request->all();

        $item = Matkul::findOrFail($id);
        $item->update($data);

        return redirect()->route('mata-kuliah.index')->with('success', 'Data Mata Kuliah Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Matkul::findOrFail($id);
        $item->delete();

        return redirect()->route('mata-kuliah.index')->with('success', 'Data Mata Kuliah Berhasil Dihapus!');
    }
}
