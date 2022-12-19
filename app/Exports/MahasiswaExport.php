<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MahasiswaExport implements FromView, ShouldAutoSize
{
    use Exportable;

    private $mahasiswas;
    public function __construct() 
    {
        $this->mahasiswas = Mahasiswa::all();
    }

    public function view(): View
    {
        return view('admin.mahasiswa.excel', [
            'mahasiswas' => $this->mahasiswas
        ]);
    }
}
