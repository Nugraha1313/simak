<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ruangan;
use App\Http\Requests\RuanganRequest;
use Alert;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Ruangan::all();

        return view('admin.ruangan.index')->with([
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
        return view('admin.ruangan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RuanganRequest $request)
    {
        $data = $request->all();

        Ruangan::create([
            'kode_ruangan' => $data['kode_ruangan'],
        ]);

        return redirect()->route('ruangan.index')->with('success', 'Data Ruangan Berhasil Ditambahkan!');
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
        $item = Ruangan::findOrFail($id);

        return view('admin.ruangan.edit')->with([
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
    public function update(RuanganRequest $request, $id)
    {
        $data = $request->all();

        $item = Ruangan::findOrFail($id);
        $item->update($data);

        return redirect()->route('ruangan.index')->with('success', 'Data Ruangan Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Ruangan::findOrFail($id);
        $item->delete();

        return redirect()->route('ruangan.index')->with('success', 'Data Ruangan Berhasil Dihapus!');
    }
}
