<?php

namespace App\Http\Controllers;

use App\Exports\ExcelInovasiDaerahAll;
use App\Exports\ExportExcel;
use App\Http\Controllers\Controller;
use App\Models\Data_Pendukung;
use App\Models\Indikator;
use App\Models\Inovasi_Pemerintah_Daerah;
use App\Models\Tahapan_Inovasi;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Excel;
use PDF;
use ZipArchive;

class InovasiPemerintahDaerahDbController extends Controller
{
    
    public function index()
    {
        $ini = Inovasi_Pemerintah_Daerah::where('tahapan_inovasi_id', 1)->count();
        $inisiatif = $ini;

        $uji = Inovasi_Pemerintah_Daerah::where('tahapan_inovasi_id', 2)->count();
        $ujiCoba = $uji;

        $pene = Inovasi_Pemerintah_Daerah::where('tahapan_inovasi_id', 3)->count();
        $penerapan = $pene;

        $currentYear = Carbon::now()->year;

        if(auth()->user()->role == 'Admin'){
            $datas = Inovasi_Pemerintah_Daerah::filter(request(['search', 'tahapan']))->orderBy('total_kematangan', 'desc')->whereYear('created_at', $currentYear)->paginate(10);
        }else{
            $datas = Inovasi_Pemerintah_Daerah::filter(request(['search', 'tahapan']))
            ->where('user_id', auth()->user()->id)->orderBy('total_kematangan', 'desc')
            ->whereYear('created_at', $currentYear)
            ->paginate(10);
        }
        return view('dashboard.pages.inovasi_daerah_db.index', [
            'page' => 'Inovasi Daerah',
            'datas' => $datas,
            'tahapanInovasis' => Tahapan_Inovasi::all(),
            'inisiatif' => $inisiatif,
            'ujiCoba' => $ujiCoba,
            'penerapan' => $penerapan
        ]);
    }

    public function downloadExcel()
    {
        // return Excel::download(new ExportExcel($id), 'inovasi'.$id.'.xlsx');
        $randomNumber = rand(10000, 99999);

        return Excel::download(new ExcelInovasiDaerahAll,' inovasi-daerah'.$randomNumber.'.xlsx');
    }

    public function exportToZip()
    {
        $data = Inovasi_Pemerintah_Daerah::all(); // Gantilah YourModel dengan model Anda

        $pdfFiles = [];

            $url = 'https://iga.sulselprov.go.id/';
            $qrCode = QrCode::size(110)->generate($url);
        
            foreach ($data as $item) {
            $pdf = PDF::loadView('dashboard.pages.inovasi_daerah_db.pdf', [
                'inovasi' => $item,
                'indikators' => Indikator::all(),
                'qrCode' => $qrCode
            ]);
            $pdfFileName = $item->nama_inovasi . '.pdf';
            $pdf->save(public_path('pdfs/' . $pdfFileName)); // Simpan file PDF ke direktori public/pdfs

            $pdfFiles[] = public_path('pdfs/' . $pdfFileName);
        }

        $zipFileName = 'data-inovasi.zip';
        $zip = new ZipArchive;
        $zip->open(public_path($zipFileName), ZipArchive::CREATE);

        foreach ($pdfFiles as $pdfFile) {
            $zip->addFile($pdfFile, pathinfo($pdfFile, PATHINFO_BASENAME));
        }

        $zip->close();

        return response()->download(public_path($zipFileName))->deleteFileAfterSend(true);
    }

}
