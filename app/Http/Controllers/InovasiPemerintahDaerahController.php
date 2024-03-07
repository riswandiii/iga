<?php

namespace App\Http\Controllers;

use App\Exports\ExportExcel;
use App\Models\Bentuk_Inovasi_Daerah;
use App\Models\Data_Pendukung;
use App\Models\FooterDashboard;
use App\Models\HarapPerhatikan;
use App\Models\HitungMundur;
use App\Models\Indikator;
use App\Models\Inisiator_Inovasi_Daerah;
use App\Models\Inovasi_Pemerintah_Daerah;
use App\Models\Jenis_Inovasi;
use App\Models\Kematangan;
use App\Models\Tahapan_Inovasi;
use App\Models\Tematik;
use App\Models\TotalKematangan;
use App\Models\Urusan_Lain;
use App\Models\Urusan_Pemerintahan;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use File;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use ZipArchive;
use Zipper;





class InovasiPemerintahDaerahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     if ($request->search) {
    //         $datas = Inovasi_Pemerintah_Daerah::where('nama_inovasi', 'like', '%' . $request->search . '%')->paginate(10);
    //     } else {
    //        $datas = Inovasi_Pemerintah_Daerah::paginate(10);
    //      }
    //     return view('dashboard.pages.lomba_inovasi_daerah.index', [
    //         'page' => 'Inovasi Pemerintah Daerah',
    //         'datas' => $datas,
    //         'tahapansInovasis' => Tahapan_Inovasi::all() 
    //     ]);
    // }

    public function index(Request $request)
    {
        if(auth()->user()->role == 'Admin'){
            $datas = Inovasi_Pemerintah_Daerah::filter(request(['search', 'tahapan']))->orderBy('total_kematangan', 'desc')->paginate(10);
        }else{
            $datas = Inovasi_Pemerintah_Daerah::filter(request(['search', 'tahapan']))->where('user_id', auth()->user()->id)->orderBy('total_kematangan', 'desc')->paginate(10);
        }

        return view('dashboard.pages.lomba_inovasi_daerah.index', [
            'page' => 'Inovasi Pemerintah Daerah',
            'datas' => $datas,
            'tahapanInovasis' => Tahapan_Inovasi::all(),
            'perhatikans' => HarapPerhatikan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tanggalSekarang = Carbon::now();
        $hitungMundur = HitungMundur::where('user_id', auth()->user()->id)->first();
        if(!empty($hitungMundur)){
            $tanggalDatabase = $hitungMundur->tanggal;
            $tanggalDatabase = Carbon::parse($tanggalDatabase);
            if ($tanggalSekarang->lt($tanggalDatabase)) {
                return view('dashboard.pages.lomba_inovasi_daerah.create', [
                    'page' => 'Tambah Inovasi Pemerintah Daerah',
                    'tahapanInovasis' => Tahapan_Inovasi::all(),
                    'inisiatorInovasiDaerah' => Inisiator_Inovasi_Daerah::all(),
                    'jenisInovasis' => Jenis_Inovasi::all(),
                    'bentukInovasis' => Bentuk_Inovasi_Daerah::all(),
                    'tematiks' => Tematik::all(),
                    'urusanUtamas' => Urusan_Pemerintahan::all(),
                    'urusanLains' => Urusan_Lain::all(),
                    'perhatikans' => HarapPerhatikan::all()
                ]);
            } else {
                return redirect(route('dashboard.inovasi.daerah'))->with('error', 'Batas Penginputan Inovasi Daerah Sudah Lewat');
            }   
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_inovasi' => 'required|min:5|max:255',
            'user_id' => 'required',
            'tahapan_inovasi_id' => 'required',
            'inisiator_inovasi_daerah_id' => 'required',
            'nama_inisiator' => '',
            'jenis_inovasi_id' => 'required',
            'bentuk_inovasi_daerah_id' => 'required',
            'tematik_id' => 'required',
            'urusan_utama_id' => 'required',
            'urusan_lain_id' => 'required',
            'waktu_uji_coba' => 'required',
            'rancang_bangun' => ['required', function ($attribute, $value, $fail) {
                $wordCount = str_word_count(strip_tags($value));

                if ($wordCount < 350) {
                    $fail("Rancang bangun minimal 350 kata!");
                }
            }],
            'waktu_penerapan' => 'required',
            'tujuan_inovasi' => 'required',
            'manfaat_diperoleh' => 'required',
            'hasil_inovasi' => 'required',
            'anggaran' => 'mimes:pdf|max:2048',
            'profil_bisnis' => 'mimes:pdf|max:2048'
        ]);

        if($request->file('anggaran')){
            $validateData['anggaran'] = $request->file('anggaran')->store('anggaran_pdf');
        }
        if($request->file('profil_bisnis')){
            $validateData['profil_bisnis'] = $request->file('profil_bisnis')->store('profil_bisnis_pdf');
        }
       Inovasi_Pemerintah_Daerah::create($validateData);
    //    return redirect(route('dashboard.inovasi.daerah'))->with('toast_success', 'Berhasil menambah inovasi daerah!');
    return redirect(route('dashboard.inovasi.daerah'))->with('success', 'Berhasil menambah inovasi daerah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit(string $id)
    {
        $inovasi = Inovasi_Pemerintah_Daerah::find($id);
        if(!empty($inovasi)){
            return view('dashboard.pages.lomba_inovasi_daerah.edit', [
                'page' => 'Edit Inovasi Pemerintah Daerah',
                'tahapanInovasis' => Tahapan_Inovasi::all(),
                'inisiatorInovasiDaerah' => Inisiator_Inovasi_Daerah::all(),
                'jenisInovasis' => Jenis_Inovasi::all(),
                'bentukInovasis' => Bentuk_Inovasi_Daerah::all(),
                'tematiks' => Tematik::all(),
                'urusanUtamas' => Urusan_Pemerintahan::all(),
                'urusanLains' => Urusan_Lain::all(),
                'inovasi' => $inovasi,
                'perhatikans' => HarapPerhatikan::all()
            ]);
        }else{
            return abort(404);
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $inovasi = Inovasi_Pemerintah_Daerah::find($id);
        $rules = [
            'nama_inovasi' => 'required|min:5|max:255',
            'user_id' => 'required',
            'tahapan_inovasi_id' => 'required',
            'inisiator_inovasi_daerah_id' => 'required',
            'nama_inisiator' => '',
            'jenis_inovasi_id' => 'required',
            'bentuk_inovasi_daerah_id' => 'required',
            'tematik_id' => 'required',
            'urusan_utama_id' => 'required',
            'urusan_lain_id' => 'required',
            'waktu_uji_coba' => 'required',
            'waktu_penerapan' => 'required',
            'rancang_bangun' => ['required', function ($attribute, $value, $fail) {
                $wordCount = str_word_count(strip_tags($value));

                if ($wordCount < 350) {
                    $fail("Rancang bangun minimal 350 kata!");
                }
            }],
            'tujuan_inovasi' => 'required',
            'manfaat_diperoleh' => 'required',
            'hasil_inovasi' => 'required',
            'anggaran' => 'mimes:pdf|max:2048',
            'profil_bisnis' => 'mimes:pdf|max:2048'
        ];
        $validateData = $request->validate($rules);
        if($inovasi->anggaran){
            if($request->file('anggaran')){
                Storage::delete($inovasi->anggaran);
                $validateData['anggaran'] = $request->file('anggaran')->store('anggaran_pdf');
            }
        }else{
            if($request->file('anggaran')){
                $validateData['anggaran'] = $request->file('anggaran')->store('anggaran_pdf');
            }
        }

        if($inovasi->profil_bisnis){
            if($request->file('profil_bisnis')){
                Storage::delete($inovasi->profil_bisnis);
                $validateData['profil_bisnis'] = $request->file('profil_bisnis')->store('profil_bisnis_pdf');
            }
        }else{
            if($request->file('profil_bisnis')){
                $validateData['profil_bisnis'] = $request->file('profil_bisnis')->store('profil_bisnis_pdf');
            }
        }
        
        Inovasi_Pemerintah_Daerah::where('id', $inovasi->id)->update($validateData);
        return redirect(route('dashboard.inovasi.daerah'))->with('success', 'Berhasil mengubah inovasi daerah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inovasi = Inovasi_Pemerintah_Daerah::find($id);
        $kematangan = Kematangan::where('inovasi_pemerintah_daerah_id', $id)->get();
        $totalKematangan = TotalKematangan::where('inovasi_pemerintah_daerah_id', $id)->first();
        $dokumen = Data_Pendukung::where('inovasi_pemerintah_daerah_id', $id)->get();
        if($inovasi->anggaran){
            Storage::delete($inovasi->anggaran);
        }
        if($inovasi->profil_bisnis){
            Storage::delete($inovasi->profil_bisnis); 
        }
        Inovasi_Pemerintah_Daerah::destroy('id', $inovasi->id);
        if($kematangan){
            Kematangan::where('inovasi_pemerintah_daerah_id', $id)->delete();
        }
        if($totalKematangan){
            $totalKematangan->delete();
        }
        if($dokumen){
            foreach ($dokumen as $row) {
                if($row->dokumen){
                    Storage::delete($row->dokumen);
                }
            }
            Data_Pendukung::where('inovasi_pemerintah_daerah_id', $id
            )->delete();
        }
        return redirect(route('dashboard.inovasi.daerah'));
    }

    public function downloadPdf($id)
    {
        $inovasi = Inovasi_Pemerintah_Daerah::find($id);
        $totalKematangan = TotalKematangan::where('inovasi_pemerintah_daerah_id', $inovasi->id)->first();
        $indiktors = Indikator::all();
        $footer = FooterDashboard::find(3);
        if(!empty($inovasi)){
            
            $url = 'https://iga.sulselprov.go.id/';
            $qrCode = QrCode::size(110)->generate($url);
            // return view('dashboard.pages.lomba_inovasi_daerah.inovasi_pdf', [
            //     'inovasi' => $inovasi,
            //     'totalKematangan' => $totalKematangan,
            //     'indikators' => $indiktors,
            //     'footer' => asset('storage/'.$footer->image),
            //     'qrCode' => $qrCode
            // ]);
            $randomNumber = rand(10000, 99999);
            $pdf = PDF::loadView('dashboard.pages.lomba_inovasi_daerah.inovasi_pdf', [
                'inovasi' => $inovasi,
                'totalKematangan' => $totalKematangan,
                'indikators' => $indiktors,
                'qrCode' => $qrCode
            ]);
            return $pdf->stream('inovasi-'.$randomNumber.'.pdf');
        }else{
           abort(403);
        }
    }

    public function downloadExcel($id)
    {
        // return Excel::download(new ExportExcel($id), 'inovasi'.$id.'.xlsx');
        $randomNumber = rand(10000, 99999);

        return Excel::download(new ExportExcel($id), 'inovasi-'.$randomNumber.'.xlsx');
    }


public function downloadPdfZip($id)
    {
        // Ambil data dari database (sesuaikan dengan model dan tabel Anda)
        $files = Data_Pendukung::where('inovasi_pemerintah_daerah_id', $id)->get();

        // Direktori tempat file PDF berada
        $pdfDir = storage_path('app/public/');

        // Nama file ZIP yang akan dihasilkan
        $zipFileName = 'dokumen-pendukung.zip';
        $zip = new ZipArchive;

        if ($zip->open($zipFileName, ZipArchive::CREATE) === TRUE) {
            foreach ($files as $file) {
                $id = $file->indikator_id;
                $namaFile = $file->dokumen;
                
                // Path lengkap file PDF
                $pdfPath = $pdfDir . $namaFile;
                $data = Inovasi_Pemerintah_Daerah::find($file->inovasi_pemerintah_daerah_id);

                // Nama file yang akan digunakan di dalam ZIP (gantilah sesuai kebutuhan)
                $zipFileNameInArchive = $data->nama_inovasi . " (Indikator " . $id . ")" .".pdf";

                // Menambahkan file ke dalam ZIP dengan nama yang diinginkan
                $zip->addFile($pdfPath, $zipFileNameInArchive);
            }

            $zip->close();

            // Mengatur header untuk tipe file ZIP
            return response()->download($zipFileName)->deleteFileAfterSend(true);
        } else {
            return response()->json(['error' => 'Gagal membuat file ZIP'], 500);
        }
    }



}
