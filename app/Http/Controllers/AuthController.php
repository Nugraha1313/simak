<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input; // sebaga agar dapat melakukan 'input::get'
use Illuminate\Support\Facades\Auth;

use Redirect; // sebagai agar dapat ngeredirect sebuah halaman

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use DB;

class AuthController extends Controller
{
    public function firstlogin()
    {
        return view('login');
    }

    public function lastlogin(Request $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            $account = DB::table('users')->where('username', $request->username)->first();

            if ($account->role == 'Administrator') {
                Auth::guard('administrator')->LoginUsingId($account->id);
                return redirect('/');
            } elseif ($account->role == 'Mahasiswa') {
                Auth::guard('mahasiswa')->LoginUsingId($account->id);
                $mahasiswa = Mahasiswa::where('email_mahasiswa', $request->username)->first();
                $request->session()->put('mahasiswa', $mahasiswa);
                return redirect('/dashboard/mahasiswa');
            } elseif ($account->role == 'Dosen') {
                Auth::guard('dosen')->LoginUsingId($account->id);
                $dosen = Dosen::where('email_dosen', $request->username)->first();
                $request->session()->put('dosen', $dosen);
                return redirect('/dashboard/dosen');
            }
        }

        return redirect('/login')->with('status', 'Username atau Password Anda Salah');
    }

    public function logout()
    {
        if (Auth::guard('administrator')->check()) {
            Auth::guard('administrator')->logout();
        } elseif (Auth::guard('mahasiswa')->check()) {
            Auth::guard('mahasiswa')->logout();
        } elseif (Auth::guard('dosen')->check()) {
            Auth::guard('dosen')->logout();
        }

        return view('home');
    }
}
