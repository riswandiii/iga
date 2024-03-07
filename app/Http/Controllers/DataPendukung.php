<?php

namespace App\Http\Controllers;

use App\Models\Data_Pendukung;
use App\Models\Indikator;
use App\Models\Inovasi_Pemerintah_Daerah;
use App\Models\InovasiMasyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataPendukung extends Controller
{
    

    public function index(Request $request)
    {
       $inovasi = Inovasi_Pemerintah_Daerah::where('id', $request->inovasi_pemerintah_daerah_id)->first();
       $dokumen = Data_Pendukung::where('inovasi_pemerintah_daerah_id', $request->inovasi_pemerintah_daerah_id)->where('indikator_id', $request->indikator_id)->get();
       if(!empty($inovasi)){
        $indikator = Indikator::where('id', $request->indikator_id)->first();
        return view('dashboard.pages.lomba_inovasi_daerah.data_pendukung.index', [
            'page' => 'Data Inovasi Daerah / Dokumen Pendukung',
            'inovasi' => $inovasi,
            'indikator' => $indikator,
            'dokumen' => $dokumen
        ]);
       }else{
            return redirect(route('dashboard.index'));
       }
    }

    public function store(Request $request)
    {
        $indikator = Indikator::find( $request->indikator_id );
        if($indikator->status == 'surat'){
            $validateData = $request->validate([
                'inovasi_pemerintah_daerah_id' => 'required',
                'indikator_id' => 'required',
                'nomor_surat' => 'required',
                'tanggal_surat' => 'required',
                'tentang' => 'required',
                'dokumen' => 'required|mimes:pdf,jpeg,png,jpg|max:2048',
            ]);
        }elseif($indikator->status == 'pdf_gambar'){
            $validateData = $request->validate([
                'inovasi_pemerintah_daerah_id' => 'required',
                'indikator_id' => 'required',
                'tentang' => 'required',
                'dokumen' => 'required|mimes:pdf,jpeg,png,jpg|max:2048',
            ]);
        }else{
            $validateData = $request->validate([
                'inovasi_pemerintah_daerah_id' => 'required',
                'indikator_id' => 'required',
                'tentang' => 'required',
                'link' => 'required',
                'dokumen' => 'required|mimes:jpeg,png,jpg|max:2048',
            ]);
        }
       
        if($request->file('dokumen')){
            $validateData['dokumen'] = $request->file('dokumen')->store('dokumen-pendukung');
        }
        Data_Pendukung::create($validateData);
        return redirect(route('dashboard.indikator.index',$request->inovasi_pemerintah_daerah_id))->with('success', 'Berhasil menambah dokumen pendukung!');
    }

    public function destroy($id)
    {
        $dokumen = Data_Pendukung::find($id);

        if($dokumen->dokumen){
            Storage::delete($dokumen->dokumen);
        }
        Data_Pendukung::destroy('id', $dokumen->id);
        return redirect(route('dashboard.indikator.index',$dokumen->inovasi_pemerintah_daerah_id));
    }


    // Untuk Inovasi Masyarkat
    public function indexx(Request $request)
    {
       $inovasi = InovasiMasyarakat::where('id', $request->inovasi_masyarakat_id)->first();
       $dokumen = Data_Pendukung::where('inovasi_masyarakat_id', $request->inovasi_masyarakat_id)->where('indikator_id', $request->indikator_id)->get();
       if(!empty($inovasi)){
        $indikator = Indikator::where('id', $request->indikator_id)->first();
        return view('dashboard.pages.lomba_inovasi_masyarakat.data_pendukung.index', [
            'page' => 'Data Inovasi Masyarakat/ Dokumen Pendukung',
            'inovasi' => $inovasi,
            'indikator' => $indikator,
            'dokumen' => $dokumen
        ]);
       }else{
            return redirect(route('dashboard.index'));
       }
    }

    public function storee(Request $request)
    {
        $indikator = Indikator::find( $request->indikator_id );
        if($indikator->status == 'surat'){
            $validateData = $request->validate([
                'inovasi_masyarakat_id' => 'required',
                'indikator_id' => 'required',
                'nomor_surat' => 'required',
                'tanggal_surat' => 'required',
                'tentang' => 'required',
                'dokumen' => 'required|mimes:pdf,jpeg,png,jpg|max:2048',
            ]);
        }elseif($indikator->status == 'pdf_gambar'){
            $validateData = $request->validate([
                'inovasi_masyarakat_id' => 'required',
                'indikator_id' => 'required',
                'tentang' => 'required',
                'dokumen' => 'required|mimes:pdf,jpeg,png,jpg|max:2048',
            ]);
        }else{
            $validateData = $request->validate([
                'inovasi_masyarakat_id' => 'required',
                'indikator_id' => 'required',
                'tentang' => 'required',
                'link' => 'required',
                'dokumen' => 'required|mimes:jpeg,png,jpg|max:2048',
            ]);
        }
       
        if($request->file('dokumen')){
            $validateData['dokumen'] = $request->file('dokumen')->store('dokumen-pendukung');
        }
        Data_Pendukung::create($validateData);
        return redirect(route('dashboard.indikator.indexx',$request->inovasi_masyarakat_id))->with('success', 'Berhasil menambah dokumen pendukung!');
    }

    public function destroyy($id)
    {
        $dokumen = Data_Pendukung::find($id);

        if($dokumen->dokumen){
            Storage::delete($dokumen->dokumen);
        }
        Data_Pendukung::destroy('id', $dokumen->id);
        return redirect(route('dashboard.indikator.indexx',$dokumen->inovasi_masyarakat_id));
    }

}
