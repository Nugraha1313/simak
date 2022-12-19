<?php

namespace App\Exports;

use App\Models\Dosen;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DosenExport implements FromView, ShouldAutoSize
{
    use Exportable;

    private $dosens;
    public function __construct() 
    {
        $this->dosens = Dosen::all();
    }

    public function view(): View
    {
        return view('admin.dosen.excel', [
            'dosens' => $this->dosens
        ]);
    }
}
