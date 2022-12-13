<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Matkul;
use App\Models\Jadwal;
use App\Models\TahunAkademik;
use App\Models\Nilai;
use App\Models\Krs;
use DB;
use DateTime;
use Alert;
use PDF;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard Administrator.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboardAdministrator()
    {
        $mahasiswa = Mahasiswa::count();
        $dosen = Dosen::count();
        $jadwal = Jadwal::count();

        // chart gender dosen
        $ar_gender_dosen = DB::table('dosens')
            ->selectRaw('gender_dosen, count(gender_dosen) as jumlah')
            ->groupBy('gender_dosen')
            ->get();
        
        // chart gender mahasiswa
        $ar_gender_mahasiswa = DB::table('mahasiswas')
            ->selectRaw('gender_mahasiswa, count(gender_mahasiswa) as jumlah')
            ->groupBy('gender_mahasiswa')
            ->get();

        return view('admin.index', compact('mahasiswa', 'dosen', 'jadwal', 'ar_gender_dosen', 'ar_gender_mahasiswa'));
    }

    /**
     * Show the application dashboard Mahasiswa.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboardMahasiswa(Request $request)
    {
        $mahasiswa = $request->session()->get('mahasiswa');
        $ta = TahunAkademik::where('status_tahunakademik', 1)->first();
        // cari jumlah sks
        $items = Krs::where('fk_mahasiswa_krs', $mahasiswa->id)->where('fk_ta_krs', $ta->id)->with(['jadwal'])->get();
        $sumSks = 0;
        foreach ($items as $item) {
            $sumSks = $sumSks + $item->jadwal->matkul->sks_matkul;
        }
        $matkul = Matkul::count();
        $kurikulum = Jadwal::count();

        return view('mahasiswa.index')->with([
            'sumSks' => $sumSks,
            'matkul' => $matkul,
            'kurikulum' => $kurikulum,
        ]);
    }

    // setting profile mahasiswa

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function indexProfileMahasiswa(Request $request)
    {
        $data = $request->session()->get('mahasiswa');
        $item = Mahasiswa::findOrFail($data->id);
    
        return view('mahasiswa.profile.index')->with([
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProfileMahasiswa(Request $request)
    {
        $data = $request->session()->get('mahasiswa');
        $item = Mahasiswa::findOrFail($data->id);
    
        return view('mahasiswa.profile.edit')->with([
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
    public function updateProfileMahasiswa(Request $request)
    {
        $data = $request->all();
    
        $mahasiswa = $request->session()->get('mahasiswa');
        $item = Mahasiswa::findOrFail($mahasiswa->id);
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
    
        return redirect()->route('profile.mahasiswa')->with('success', 'Data Profile Berhasil Diubah!');
    }

    /**
     * Show the application jadwal perkuliahan Mahasiswa.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function jadwalMahasiswa(Request $request)
    {
        $data = $request->session()->get('mahasiswa');
        $mahasiswa = Mahasiswa::findOrFail($data->id);
        $ta = TahunAkademik::where('status_tahunakademik', 1)->first();
        
        $items = Krs::where('fk_mahasiswa_krs', $mahasiswa->id)->where('fk_ta_krs', $ta->id)->with(['jadwal'])->get();
        
        
        return view('mahasiswa.jadwal.index')->with([
            'items' => $items,
        ]);
    }

    /**
     * Display a export jadwal perkuliahan to PDF of the resource Mahasiswa.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function jadwalMahasiswaPDF(Request $request)
    {
        $data = $request->session()->get('mahasiswa');
        $mahasiswa = Mahasiswa::findOrFail($data->id);
        $ta = TahunAkademik::where('status_tahunakademik', 1)->first();
        
        $items = Krs::where('fk_mahasiswa_krs', $mahasiswa->id)->where('fk_ta_krs', $ta->id)->with(['jadwal'])->get();
        
        
        // return view('mahasiswa.jadwal.index')->with([
        //     'items' => $items,
        // ]);

        $data = [
            'items' => $items,
            'mahasiswa' => $mahasiswa,
        ];

        $pdf = PDF::loadView('mahasiswa.jadwal.pdf', $data)->setOptions([['dpi' => 600, 'defaultFont' => 'sans-serif']]);

        return $pdf->download("Jadwal-Perkuliahan-$mahasiswa->nim_mahasiswa-NFComputer.pdf");
    }

    /**
     * Display a export KRS to PDF of the resource Mahasiswa.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function krsPDF(Request $request)
    {
        $mahasiswa = $request->session()->get('mahasiswa');
        $ta = TahunAkademik::where('status_tahunakademik', 1)->first();
        
        $items = Krs::where('fk_mahasiswa_krs', $mahasiswa->id)->where('fk_ta_krs', $ta->id)->with(['jadwal'])->get();

        $sumSks = 0;
        foreach ($items as $index => $item) {
            // hitung jumlah sks
            $sumSks += $item->jadwal->matkul->sks_matkul;
            
        }

        // ambil tanggal sekarang
        $date = new DateTime('now');
        $tanggal = $date->format('d F Y');
        
        
        return view('mahasiswa.krs.pdf')->with([
            'mahasiswa' => $mahasiswa,
            'ta' => $ta,
            'tanggal' => $tanggal,
            'items' => $items,
            'sumSks' => $sumSks,
        ]);
    }

    /**
     * Display a KHS of the resource Mahasiswa.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function khs(Request $request)
    {
        $mahasiswa = $request->session()->get('mahasiswa');
        $ta = TahunAkademik::where('status_tahunakademik', 1)->first();

        $nilais = Nilai::where('fk_mahasiswa_nilai', $mahasiswa->id)->where('fk_ta_nilai', $ta->id)->get();

        $sumSks = 0;
        $sumBobot = 0;
        foreach ($nilais as $index => $nilai) {
            // hitung jumlah sks
            $sumSks += $nilai->jadwal->matkul->sks_matkul;

            // hitung jumlah bobot
            $bobot = $nilai->skor_nilai * $nilai->jadwal->matkul->sks_matkul;
            $sumBobot += $bobot;
            
        }

        return view('mahasiswa.khs.index')->with([
            'ta' => $ta,
            'mahasiswa' => $mahasiswa,
            'nilais' => $nilais,
            'sumSks' => $sumSks,
            'sumBobot' => $sumBobot,
        ]);
    }
    
    /**
     * Show the application dashboard Dosen.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboardDosen(Request $request)
    {
        $dosen = $request->session()->get('dosen');
        $ta = TahunAkademik::where('status_tahunakademik', 1)->first();
        
        $items = Jadwal::where('fk_dosen_jadwal', $dosen->id)->where('fk_ta_jadwal', $ta->id)->get();
        // $sumMatkul = 0;
        // foreach ($items as $item) {
            //     $sumMatkul = $sumMatkul + $item->jadwal->matkul->count();
            // }
        $jadwal = $items->count();
        
        $item = Jadwal::where('fk_dosen_jadwal', $dosen->id)->where('fk_ta_jadwal', $ta->id)->first();
        $datas = Nilai::where('fk_jadwal_nilai', $item->id)->with('mahasiswa')->get();
        
        $mahasiswa = $datas->count();

        $data = Jadwal::where('fk_dosen_jadwal', $dosen->id)->where('fk_ta_jadwal', $ta->id)->with('matkul')->get();
        $sumMatkul = $data->count();
        
        return view('dosen.index')->with([
            'jadwal' => $jadwal,
            'mahasiswa' => $mahasiswa,
            'sumMatkul' => $sumMatkul,
        ]);
    }

    // setting profile dosen

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function indexProfileDosen(Request $request)
    {
        $data = $request->session()->get('dosen');
        $item = Dosen::findOrFail($data->id);
    
        return view('dosen.profile.index')->with([
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProfileDosen(Request $request)
    {
        $data = $request->session()->get('dosen');
        $item = Dosen::findOrFail($data->id);
    
        return view('dosen.profile.edit')->with([
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
    public function updateProfileDosen(Request $request)
    {
        $data = $request->all();
    
        $dosen = $request->session()->get('dosen');
        $item = Dosen::findOrFail($dosen->id);
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
    
        return redirect()->route('profile.dosen')->with('success', 'Data Profile Berhasil Diubah!');
    }
        
    /**
     * Show the application jadwal mengajar Dosen.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function jadwalDosen(Request $request)
    {
        $dosen = $request->session()->get('dosen');
        $ta = TahunAkademik::where('status_tahunakademik', 1)->first();
        
        $datas = Jadwal::where('fk_dosen_jadwal', $dosen->id)->where('fk_ta_jadwal', $ta->id)->with('matkul')->get();
        
        
        return view('dosen.jadwal.index')->with([
            'datas' => $datas,
        ]);
    }

    /**
     * Display a export jadwal mengajar to PDF of the resource Dosen.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function jadwalDosenPDF(Request $request)
    {
        $dosen = $request->session()->get('dosen');
        $item = Dosen::findOrFail($dosen->id);
        $ta = TahunAkademik::where('status_tahunakademik', 1)->first();
        
        $datas = Jadwal::where('fk_dosen_jadwal', $dosen->id)->where('fk_ta_jadwal', $ta->id)->with('matkul')->get();
        
        
        // return view('dosen.jadwal.pdf')->with([
        //     'datas' => $datas,
        //     'item' => $item,
        // ]);

        $data = [
            'datas' => $datas,
            'item' => $item,
        ];

        $pdf = PDF::loadView('dosen.jadwal.pdf', $data)->setOptions([['dpi' => 600, 'defaultFont' => 'sans-serif']]);

        return $pdf->download("Jadwal-Mengajar-$dosen->nip_dosen-NFComputer.pdf");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
