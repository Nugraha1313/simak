<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mahasiswa;
use App\Models\User;
use App\Http\Requests\MahasiswaRequest;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Mahasiswa::all();

        return view('admin.mahasiswa.index')->with([
            'items' => $items
        ]);
    }

     public function apiMahasiswa()
    {
        //menampilkan seluruh data
        $mahasiswa = Mahasiswa::all();
        // $dosen = Dosen::join('jabatan', 'jabatan.id', '=', 'pegawai.jabatan_id')
        //         ->join('divisi', 'divisi.id', '=', 'pegawai.divisi_id')
        //         ->select('pegawai.nip','pegawai.nama','pegawai.gender','jabatan.nama AS posisi',
        //          'divisi.nama AS bagian','pegawai.tmp_lahir','pegawai.tgl_lahir',
        //          'pegawai.alamat',)
        //         ->get();
        return response()->json(
            [
                'success'=>true,
                'message'=>'Data Mahasiswa',
                'data'=>$mahasiswa,
            ],200);
    }

    public function apiMahasiswaDetail($id)
    {
        //menampilkan detail data seorang pegawai
        $mahasiswa = Mahasiswa::find($id);
        // $dosen = Dosen::join('jabatan', 'jabatan.id', '=', 'pegawai.jabatan_id')
        // ->join('divisi', 'divisi.id', '=', 'pegawai.divisi_id')
        // ->select('pegawai.nip','pegawai.nama','pegawai.gender','jabatan.nama AS posisi',
        //  'divisi.nama AS bagian','pegawai.tmp_lahir','pegawai.tgl_lahir',
        //  'pegawai.alamat',)
        // ->where('pegawai.id', '=', $id)
        // ->get();

        if($mahasiswa){ //jika data pegawai ditemukan
            return response()->json(
                [
                    'success'=>true,
                    'message'=>'Detail Mahasiswa',
                    'data'=>$mahasiswa,
                ],200);
        }
        else{ //jika data pegawai tidak ditemukan
            return response()->json(
                [
                    'success'=>false,
                    'message'=>'Detail Mahasiswa Tidak ditemukan',
                ],404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MahasiswaRequest $request)
    {
        $data = $request->all();

        $fotoName = $data['foto_mahasiswa']->getClientOriginalName() . '-' . time(). '.' . $data['foto_mahasiswa']->extension();
        $data['foto_mahasiswa']->move(public_path('admin/img/profile/mahasiswa'), $fotoName);

        Mahasiswa::create([
            'nim_mahasiswa' => $data['nim_mahasiswa'],
            'nama_mahasiswa' => $data['nama_mahasiswa'],
            'tmp_mahasiswa' => $data['tmp_mahasiswa'],
            'tgl_mahasiswa' => $data['tgl_mahasiswa'],
            'alamat_mahasiswa' => $data['alamat_mahasiswa'],
            'prodi_mahasiswa' => $data['prodi_mahasiswa'],
            'agama_mahasiswa' => $data['agama_mahasiswa'],
            'telp_mahasiswa' => $data['telp_mahasiswa'],
            'email_mahasiswa' => $data['email_mahasiswa'],
            'gender_mahasiswa' => $data['gender_mahasiswa'],
            'foto_mahasiswa' => $fotoName,
        ]);

        User::create([
            'name' => $data['nama_mahasiswa'],
            'username' => $data['email_mahasiswa'],
            'password' => Hash::make($data['password']),
            'role' => "Mahasiswa",
        ]);

        return redirect()->route('mahasiswa.index')->with('status', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Mahasiswa::findOrFail($id);

        return view('admin.mahasiswa.detail')->with([
            'item' => $item
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
        $item = Mahasiswa::findOrFail($id);

        return view('admin.mahasiswa.edit')->with([
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
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = Mahasiswa::findOrFail($id);
        $user = User::where('username', $item->email_mahasiswa)->first();

        if($request->foto_mahasiswa == ""){
            $fotoName = $item->foto_mahasiswa;
        }else{
            $fotoName = $data['foto_mahasiswa']->getClientOriginalName() . '-' . time(). '.' . $data['foto_mahasiswa']->extension();
            $data['foto_mahasiswa']->move(public_path('admin/img/profile/mahasiswa'), $fotoName);
            if($item->foto_mahasiswa == NULL){

            }else{
                unlink(public_path('admin/img/profile')."/mahasiswa/".$item->foto_mahasiswa);
            }
        }

        Mahasiswa::where('id', $item->id)
        ->update([
            'nim_mahasiswa' => $data['nim_mahasiswa'],
            'nama_mahasiswa' => $data['nama_mahasiswa'],
            'tmp_mahasiswa' => $data['tmp_mahasiswa'],
            'tgl_mahasiswa' => $data['tgl_mahasiswa'],
            'alamat_mahasiswa' => $data['alamat_mahasiswa'],
            'prodi_mahasiswa' => $data['prodi_mahasiswa'],
            'agama_mahasiswa' => $data['agama_mahasiswa'],
            'telp_mahasiswa' => $data['telp_mahasiswa'],
            'email_mahasiswa' => $data['email_mahasiswa'],
            'gender_mahasiswa' => $data['gender_mahasiswa'],
            'foto_mahasiswa' => $fotoName,
        ]);

        if($request->password == ""){
            $password = $user->password;
        }else{
            $password = Hash::make($data['password']);
        }

        User::where('id', $user->id)
        ->update([
            'name' => $data['nama_mahasiswa'],
            'username' => $data['email_mahasiswa'],
            'password' => $password,
        ]);

        return redirect()->route('mahasiswa.index')->with('status', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Mahasiswa::findOrFail($id);
        $item->delete();

        $user = User::where('username', $item->email_mahasiswa)->first();
        User::where('id', $user['id'])->delete();

        return redirect()->route('mahasiswa.index')->with('status', 'Data berhasil dihapus!');
    }
}