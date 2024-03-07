<?php

// app/Exports/UserExport.php
namespace App\Exports;

use App\Models\Inovasi_Pemerintah_Daerah;
use App\Models\TotalKematangan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use Illuminate\Contracts\View\View;

class ExportExcel implements FromView
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function view(): View
    {
        $inovasi = Inovasi_Pemerintah_Daerah::where('id', $this->id)->first();
        $kematangan = TotalKematangan::where('inovasi_pemerintah_daerah_id', $inovasi->id)->first();
        return view('dashboard.pages.lomba_inovasi_daerah.inovasi_excel', [
            'inovasi' => $inovasi,
            'kematangan' => $kematangan
        ]);
    }
}

