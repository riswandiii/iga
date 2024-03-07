<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\HitungMundur;
use App\Models\Inovasi_Pemerintah_Daerah;
use App\Models\InovasiMasyarakat;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        

        $inisiatifDaerah = Inovasi_Pemerintah_Daerah::where('tahapan_inovasi_id', 1)->count();
        $ujiCobaDaerah = Inovasi_Pemerintah_Daerah::where('tahapan_inovasi_id', 2)->count();
        $penerapanDaerah = Inovasi_Pemerintah_Daerah::where('tahapan_inovasi_id', 3)->count();

        // $inisiatifMasyarakat = InovasiMasyarakat::where('tahapan_inovasi_id', 1)->count();
        // $ujiCobaMasyarakat = InovasiMasyarakat::where('tahapan_inovasi_id', 2)->count();
        // $penerapanMasyarakat = InovasiMasyarakat::where('tahapan_inovasi_id', 3)->count();

        $tanggalSekarang = Carbon::now();
        $hitungMundur = HitungMundur::where('user_id', auth()->user()->id)->first();
        if(!empty($hitungMundur)){
            $tanggalDatabase = $hitungMundur->tanggal;
            $tanggalDatabase = Carbon::parse($tanggalDatabase);
            if ($tanggalSekarang->lt($tanggalDatabase)) {
               $tanggal = 'Penginputan Inovasi Sampai ' . $tanggalDatabase->format( 'd F Y' ) ;
            } else {
                $tanggal = 'Batas Penginputan Inovasi Sudah Lewat';
            }   
        }else{
            $tanggal = 'noTanggal';
        }
        return view('dashboard.dashboard', [
            'page' => 'Dashboard',
            'inisiatifDaerah' => $inisiatifDaerah,
            'ujiCobaDaerah' => $ujiCobaDaerah,
            'penerapanDaerah' => $penerapanDaerah,
            // 'inisiatifMasyarakat' => $inisiatifMasyarakat,
            // 'ujiCobaMasyarakat' => $ujiCobaMasyarakat,
            // 'penerapanMasyarakat' => $penerapanMasyarakat,
            'tanggalSekarang' => $tanggalSekarang,
            'tanggal' => $tanggal,
            'sampaiTanggal' => $tanggalDatabase->format( 'd F Y' )
        ]);
    }

    public function faq()
    {
        return view('dashboard.pages.faq.index', [
            'page' => 'Faq'
        ]);
    }
}
