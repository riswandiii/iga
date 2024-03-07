<?php

namespace App\Exports;
use App\Models\InovasiMasyarakat;
use App\Models\TotalKematangan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExcelInovasiMasyarakat implements FromView
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function view(): View
    {
        $inovasi = InovasiMasyarakat::where('id', $this->id)->first();
        $kematangan = TotalKematangan::where('inovasi_masyarakat_id', $inovasi->id)->first();
        return view('dashboard.pages.lomba_inovasi_masyarakat.inovasi_excel', [
            'inovasi' => $inovasi,
            'kematangan' => $kematangan
        ]);
    }
}
