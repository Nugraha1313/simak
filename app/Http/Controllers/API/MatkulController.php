<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Matkul;
use App\Http\Resources\MatkulResource;

use Illuminate\Support\Facades\Validator;

class MatkulController extends Controller
{
    public function index()
    {
        $matkul = Matkul::all();

        return new MatkulResource(true, 'Data Matkul', $matkul);
    }

    public function show($id)
    {
        $matkul = Matkul::findOrFail($id);

        return new MatkulResource(true, 'Data Detail Matkul', $matkul);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
            'sks_matkul' => 'required|integer',
            'ket_matkul' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        $matkul =  Matkul::create([
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->nama_matkul,
            'sks_matkul' => $request->sks_matkul,
            'ket_matkul' => $request->ket_matkul,
        ]);

        return new MatkulResource(true, 'Data Matkul Berhasil Ditambahkan', $matkul);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
            'sks_matkul' => 'required|integer',
            'ket_matkul' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        $matkul =  Matkul::findOrFail($id)->update([
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->nama_matkul,
            'sks_matkul' => $request->sks_matkul,
            'ket_matkul' => $request->ket_matkul,
        ]);

        return new MatkulResource(true, 'Data Matkul Berhasil Diubah', $matkul);
    }

    public function destroy($id)
    {
        $matkul = Matkul::findOrFail($id);
        $matkul->delete();

        return new MatkulResource(true, 'Data Matkul Berhasil Dihapus', $matkul);
    }

}
