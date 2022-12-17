<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerDosen(Request $request) {
        $inputDosen = [
            'nip_dosen' => $request->nip_dosen,
            'nama_dosen' => $request->nama_dosen,
            'tmp_dosen' => $request->tmp_dosen,
            'tgl_dosen' => $request->tgl_dosen,
            'alamat_dosen' => $request->alamat_dosen,
            'prodi_dosen' => $request->prodi_dosen,
            'agama_dosen' => $request->agama_dosen,
            'telp_dosen' => $request->telp_dosen,
            'email_dosen' => $request->email_dosen,
            'gender_dosen' => $request->gender_dosen,
            'foto_dosen' => '',
        ];

        $inputUser = [
            'name' => $request->nama_dosen,
            'username' => $request->email_dosen,
            'password' => Hash::make($request->password),
            'role' => "Dosen"
        ];

        $dosen = Dosen::create($inputDosen);
        $user = User::create($inputUser);

        return response()->json([
            "status" => "success",
            "message" => "Register Success"
        ]);
    }

    public function registerMahasiswa(Request $request) {
        $inputMahasiswa = [
            'nim_mahasiswa' => $request->nim_mahasiswa,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'tmp_mahasiswa' => $request->tmp_mahasiswa,
            'tgl_mahasiswa' => $request->tgl_mahasiswa,
            'alamat_mahasiswa' => $request->alamat_mahasiswa,
            'prodi_mahasiswa' => $request->prodi_mahasiswa,
            'agama_mahasiswa' => $request->agama_mahasiswa,
            'telp_mahasiswa' => $request->telp_mahasiswa,
            'email_mahasiswa' => $request->email_mahasiswa,
            'gender_mahasiswa' => $request->gender_mahasiswa,
            'foto_mahasiswa' => '',
        ];

        $inputUser = [
            'name' => $request->nama_mahasiswa,
            'username' => $request->email_mahasiswa,
            'password' => Hash::make($request->password),
            'role' => "Mahasiswa"
        ];

        $mahasiswa = Mahasiswa::create($inputMahasiswa);
        $user = User::create($inputUser);

        return response()->json([
            "status" => "success",
            "message" => "Register Success"
        ]);
    }



    public function login(Request $request) {
        $input = [
            "username" => $request->username,
            "password" => $request->password
        ];

        $user = User::where('username', $input['username'])->first();
        if(Auth::attempt($input)) {
            $token = $user->createToken("token")->plainTextToken;
            return response()->json([
                "code" => 200,
                "status" => "success",
                "message" => "Login success",
                "token" => $token
            ]);
        }else {
            return response()->json([
                "code" => 401,
                "status" => "error",
                "message" => "Login failed"
            ]);
        }

    }
}