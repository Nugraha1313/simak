<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function jadwalMahasiswaPDF()
    {
        // retreive all records from db
        $jadwal = Jadwal::all();
        // share data to view
        view()->share('jadwal', $jadwal);
        $pdf = PDF::loadView('mahasiswa.jadwal.pdf', $jadwal);
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }
}
