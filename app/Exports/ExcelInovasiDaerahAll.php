<?php

namespace App\Exports;

use App\Models\Inovasi_Pemerintah_Daerah;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExcelInovasiDaerahAll implements FromView
{
    public function view(): View
    {
        return view('dashboard.pages.inovasi_daerah_db.excel', [
            'datas' => Inovasi_Pemerintah_Daerah::all(), 
        ]);
    }
}