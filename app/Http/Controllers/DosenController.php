<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dosen;
use App\Models\User;
use App\Http\Requests\DosenRequest;
use App\Exports\DosenExport;
use Illuminate\Support\Facades\Hash;
use Alert;
use Maatwebsite\Excel\Facades\Excel;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Dosen::all();

        return view('admin.dosen.index')->with([
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
        return view('admin.dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DosenRequest $request)
    {
        $data = $request->all();
        
        $fotoName = $data['foto_dosen']->getClientOriginalName() . '-' . time(). '.' . $data['foto_dosen']->extension();
        $data['foto_dosen']->move(public_path('admin/img/profile/dosen'), $fotoName);

        Dosen::create([
            'nip_dosen' => $data['nip_dosen'],
            'nama_dosen' => $data['nama_dosen'],
            'tmp_dosen' => $data['tmp_dosen'],
            'tgl_dosen' => $data['tgl_dosen'],
            'alamat_dosen' => $data['alamat_dosen'],
            'prodi_dosen' => $data['prodi_dosen'],
            'agama_dosen' => $data['agama_dosen'],
            'telp_dosen' => $data['telp_dosen'],
            'email_dosen' => $data['email_dosen'],
            'gender_dosen' => $data['gender_dosen'],
            'foto_dosen' => $fotoName,
        ]);

        User::create([
            'name' => $data['nama_dosen'],
            'username' => $data['email_dosen'],
            'password' => Hash::make($data['password']),
            'role' => "Dosen",
        ]);

        return redirect()->route('dosen.index')->with('success', 'Data Dosen Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Dosen::findOrFail($id);

        return view('admin.dosen.detail')->with([
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
        $item = Dosen::findOrFail($id);

        return view('admin.dosen.edit')->with([
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

        $item = Dosen::findOrFail($id);
        $user = User::where('username', $item->email_dosen)->first();

        if($request->foto_dosen == ""){
            $fotoName = $item->foto_dosen;
        }else{
            $fotoName = $data['foto_dosen']->getClientOriginalName() . '-' . time(). '.' . $data['foto_dosen']->extension();
            $data['foto_dosen']->move(public_path('admin/img/profile/dosen'), $fotoName);
            if($item->foto_dosen == NULL){

            }else{
                unlink(public_path('admin/img/profile')."/dosen/".$item->foto_dosen);
            }
        }

        Dosen::where('id', $item->id)
        ->update([
            'nip_dosen' => $data['nip_dosen'],
            'nama_dosen' => $data['nama_dosen'],
            'tmp_dosen' => $data['tmp_dosen'],
            'tgl_dosen' => $data['tgl_dosen'],
            'alamat_dosen' => $data['alamat_dosen'],
            'prodi_dosen' => $data['prodi_dosen'],
            'agama_dosen' => $data['agama_dosen'],
            'telp_dosen' => $data['telp_dosen'],
            'email_dosen' => $data['email_dosen'],
            'gender_dosen' => $data['gender_dosen'],
            'foto_dosen' => $fotoName,
        ]);

        if($request->password == ""){
            $password = $user->password;
        }else{
            $password = Hash::make($data['password']);
        }
        
        User::where('id', $user->id)
        ->update([
            'name' => $data['nama_dosen'],
            'username' => $data['email_dosen'],
            'password' => $password,
        ]);

        return redirect()->route('dosen.index')->with('success', 'Data Dosen Berhasil Diubah!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Dosen::findOrFail($id);
        if(!empty($item->foto_dosen)) unlink('admin/img/profile/dosen'.$item->foto_dosen);
        $item->delete();

        $user = User::where('username', $item->email_dosen)->first();
        User::where('id', $user['id'])->delete();

        return redirect()->route('dosen.index')->with('success', 'Data Dosen Berhasil Dihapus!');
    }

    // export data dosen to file excel
    public function export()
    {
        return Excel::download(new DosenExport, 'data-dosen.xlsx');
    }
}
