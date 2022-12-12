<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TahunAkademik;
use App\Http\Resources\TahunAkademikResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TahunAkademikController extends Controller
{
    public function index()
    {
        //menampilkan seluruh data
        $data = TahunAkademik::all();

        return new TahunAkademikResource(true, 'Data Tahun Akademik',$data);
    }

    public function show($id)
    {
        //menampilkan detail data seorang pegawai
        $data = TahunAkademik::find($id);

        return new TahunAkademikResource(true, 'Detail Tahun Akademik',$data);
    }

    public function store(Request $request)
    {
        //proses input pegawai
        $validator = Validator::make($request->all(),[
            'kode_tahunakademik' => 'required',
            // 'status_tahunakademik' => 'required'
        ]);

        //cek error atau tidak inputan data
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        //proses menyimpan data yg diinput
        $data = TahunAkademik::create([
            'kode_tahunakademik' => $request->kode_tahunakademik,
            // 'nama' => $request->status_tahunakademik,
        ]);

        return new TahunAkademikResource(true, 'Data Tahun Akademik Berhasil diinput',$data);
    }
}