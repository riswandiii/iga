<?php

namespace App\Http\Controllers;

use App\Models\Inovasi_Pemerintah_Daerah;
use App\Models\InovasiMasyarakat;
use App\Models\ManualBook;
use App\Models\Pengumuman;
use App\Models\PetunjukTekni;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $inovasiDaerah = Inovasi_Pemerintah_Daerah::count();
        $totalInovasi = $inovasiDaerah;

        $ini = Inovasi_Pemerintah_Daerah::where('tahapan_inovasi_id', 1)->count();
        $inisiatif = $ini;

        $uji = Inovasi_Pemerintah_Daerah::where('tahapan_inovasi_id', 2)->count();
        $ujiCoba = $uji;

        $pene = Inovasi_Pemerintah_Daerah::where('tahapan_inovasi_id', 3)->count();
        $penerapan = $pene;

        return view('index', [
            'totalInovasi' => $totalInovasi,
            'ujiCoba' => $ujiCoba,
            'penerapan' => $penerapan,
            'inisiatif' => $inisiatif
        ]);
    }

    public function panduan()
    {
        return view('pages.manual_book.index', [
            'manualBooks' => ManualBook::paginate(10)
        ]);
    }

    public function pengumuman()
    {
        return view('pages.pengumuman.index', [
            'pengumumans' => Pengumuman::paginate(10)
        ]);
    }

    public function dokumen()
    {
        return view('pages.petunjuk_teknis.index', [
            'petunjukTeknis' => PetunjukTekni::paginate(10)
        ]);
    }

    
}
