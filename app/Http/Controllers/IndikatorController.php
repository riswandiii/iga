<?php

namespace App\Http\Controllers;

use App\Models\Data_Pendukung;
use App\Models\Indikator;
use App\Models\Inovasi_Pemerintah_Daerah;
use App\Models\InovasiMasyarakat;
use App\Models\Kematangan;
use App\Models\Parameter;
use App\Models\TotalKematangan;
use Illuminate\Http\Request;

class IndikatorController extends Controller
{
    //
    public function index($id)
    {
        $inovasi = Inovasi_Pemerintah_Daerah::find($id); 
        if(!empty($inovasi)){
            return view('dashboard.pages.lomba_inovasi_daerah.indikator.index', [
            'page' => 'Indikator Inovasi Daerah',
            'datas' => Indikator::all(),
            'inovasi' => $inovasi
        ]);
    }else{  
            return abort(403);
            // return redirect(route('dashboard.index'))->with('error', 'Tidak ditemukan!');
        }
    }

    public function edit($id)
    {
        $indikator = Indikator::find($id);
        return response()->json([
            'success' => 200,
            'data' => $indikator
        ]);
    }

    public function CreateOrUpdate(Request $request)
    {
       $indikator = Indikator::find($request->indikator_id);
       $parameter = Parameter::find($request->parameter_id);
       $dataPendukung = Data_Pendukung::where('indikator_id', $request->indikator_id)->where('inovasi_pemerintah_daerah_id', $request->inovasi_pemerintah_daerah_id)->get();
       $kematanganCek = Kematangan::where('inovasi_pemerintah_daerah_id', $request->inovasi_pemerintah_daerah_id)->where('indikator_id', $request->indikator_id)->where('parameter_id',61)->first();
       
       if(!empty($kematanganCek)){
            $dPedukungs = Data_Pendukung::where('indikator_id', $request->indikator_id)->where('inovasi_pemerintah_daerah_id', $request->inovasi_pemerintah_daerah_id)->get();
            if($dPedukungs->count() > 0){
                $kematangan = Kematangan::where('inovasi_pemerintah_daerah_id', $request->inovasi_pemerintah_daerah_id)->where('indikator_id', $request->indikator_id)->first();
 
                $validateData = $request->validate([
                    'parameter_id' => 'required'
                ]);
        
               if(!empty($kematangan)){
                 //    Update table total kematangan
                 $total = TotalKematangan::where('inovasi_pemerintah_daerah_id', $request->inovasi_pemerintah_daerah_id)->first();
                 if($dataPendukung->count() > 0){
                    $total->total = $total->total - $kematangan->parameter->bobot;
                    $total->total = $total->total + $parameter->bobot;
                    }else{
                        $total->total = $total->total;
                    }
                 $total->save();
                 // Update table kematangan
                 $kematangan->parameter_id = $parameter->id;
                 $kematangan->save();
        
               }else{
                // Create table kematangan
                $kematangans = new Kematangan();
                if($dataPendukung->count() > 0){
                    $kematangans->inovasi_pemerintah_daerah_id = $request->inovasi_pemerintah_daerah_id;
                    $kematangans->indikator_id = $indikator->id;
                    $kematangans->parameter_id = $parameter->id;
                }else{
                    $kematangans->inovasi_pemerintah_daerah_id = $request->inovasi_pemerintah_daerah_id;
                    $kematangans->indikator_id = $indikator->id;
                    $kematangans->parameter_id = 61;
                }
                $kematangans->save();
        
                // Create or Update table total total kematangan
                $total = TotalKematangan::where('inovasi_pemerintah_daerah_id', $request->inovasi_pemerintah_daerah_id)->first();
                if(!empty($total)){
                    if($dataPendukung->count() > 0){
                        $total->total = $total->total + $parameter->bobot;
                    }else{
                        // $total->total = $total->total + 0;
                    }
                    $total->save();
                }else{
                    $total = new TotalKematangan();
                    $total->inovasi_pemerintah_daerah_id = $request->inovasi_pemerintah_daerah_id;
                    if($dataPendukung->count() > 0){
                        $total->total = $parameter->bobot;
                    }else{
                        $total->total = 0;
                    }
                    $total->save();
                }
        
            }
            }else{
                // Update tota_kematangan inovasi
                $totalKematangan = TotalKematangan::where('inovasi_pemerintah_daerah_id', $request->inovasi_pemerintah_daerah_id)->first();
                $inovasi = Inovasi_Pemerintah_Daerah::find($request->inovasi_pemerintah_daerah_id);
                $inovasi->total_kematangan = $totalKematangan->total;
                $inovasi->save();
                return redirect(route('dashboard.indikator.index', $request->inovasi_pemerintah_daerah_id));
            }
       }else{
        $kematangan = Kematangan::where('inovasi_pemerintah_daerah_id', $request->inovasi_pemerintah_daerah_id)->where('indikator_id', $request->indikator_id)->first();
 
         $validateData = $request->validate([
             'parameter_id' => 'required'
         ]);
 
        if(!empty($kematangan)){
          //    Update table total kematangan
          $total = TotalKematangan::where('inovasi_pemerintah_daerah_id', $request->inovasi_pemerintah_daerah_id)->first();
          if($dataPendukung->count() > 0){
             $total->total = $total->total - $kematangan->parameter->bobot;
             $total->total = $total->total + $parameter->bobot;
             }else{
                 $total->total = $total->total;
             }
          $total->save();
          // Update table kematangan
          $kematangan->parameter_id = $parameter->id;
          $kematangan->save();
 
        }else{
         // Create table kematangan
         $kematangans = new Kematangan();
         if($dataPendukung->count() > 0){
             $kematangans->inovasi_pemerintah_daerah_id = $request->inovasi_pemerintah_daerah_id;
             $kematangans->indikator_id = $indikator->id;
             $kematangans->parameter_id = $parameter->id;
         }else{
             $kematangans->inovasi_pemerintah_daerah_id = $request->inovasi_pemerintah_daerah_id;
             $kematangans->indikator_id = $indikator->id;
             $kematangans->parameter_id = 61;
         }
         $kematangans->save();
 
         // Create or Update table total total kematangan
         $total = TotalKematangan::where('inovasi_pemerintah_daerah_id', $request->inovasi_pemerintah_daerah_id)->first();
         if(!empty($total)){
             if($dataPendukung->count() > 0){
                 $total->total = $total->total + $parameter->bobot;
             }else{
                 // $total->total = $total->total + 0;
             }
             $total->save();
         }else{
             $total = new TotalKematangan();
             $total->inovasi_pemerintah_daerah_id = $request->inovasi_pemerintah_daerah_id;
             if($dataPendukung->count() > 0){
                 $total->total = $parameter->bobot;
             }else{
                 $total->total = 0;
             }
             $total->save();
         }
 
     }
       }
     // Update tota_kematangan inovasi
     $totalKematangan = TotalKematangan::where('inovasi_pemerintah_daerah_id', $request->inovasi_pemerintah_daerah_id)->first();
     $inovasi = Inovasi_Pemerintah_Daerah::find($request->inovasi_pemerintah_daerah_id);
     $inovasi->total_kematangan = $totalKematangan->total;
     $inovasi->save();
    return redirect(route('dashboard.indikator.index', $request->inovasi_pemerintah_daerah_id));
}



// Untuk INovasi Masyarakat
public function indexx($id)
    {
        $inovasi = InovasiMasyarakat::find($id); 
        if(!empty($inovasi)){
            return view('dashboard.pages.lomba_inovasi_masyarakat.indikator.index', [
            'page' => 'Indikator Inovasi Masyarakat',
            'datas' => Indikator::all(),
            'inovasi' => $inovasi
        ]);
    }else{  
            return abort(403);
            // return redirect(route('dashboard.index'))->with('error', 'Tidak ditemukan!');
        }
    }

    public function CreateOrUpdatee(Request $request)
    {
       $indikator = Indikator::find($request->indikator_id);
       $parameter = Parameter::find($request->parameter_id);
       $dataPendukung = Data_Pendukung::where('indikator_id', $request->indikator_id)->where('inovasi_masyarakat_id', $request->inovasi_masyarakat_id)->get();
       $kematanganCek = Kematangan::where('inovasi_masyarakat_id', $request->inovasi_masyarakat_id)->where('indikator_id', $request->indikator_id)->where('parameter_id',61)->first();
       
       if(!empty($kematanganCek)){
            $dPedukungs = Data_Pendukung::where('indikator_id', $request->indikator_id)->where('inovasi_masyarakat_id', $request->inovasi_masyarakat_id)->get();
            if($dPedukungs->count() > 0){
                $kematangan = Kematangan::where('inovasi_masyarakat_id', $request->inovasi_masyarakat_id)->where('indikator_id', $request->indikator_id)->first();
 
                $validateData = $request->validate([
                    'parameter_id' => 'required'
                ]);
        
               if(!empty($kematangan)){
                 //    Update table total kematangan
                 $total = TotalKematangan::where('inovasi_masyarakat_id', $request->inovasi_masyarakat_id)->first();
                 if($dataPendukung->count() > 0){
                    $total->total = $total->total - $kematangan->parameter->bobot;
                    $total->total = $total->total + $parameter->bobot;
                    }else{
                        $total->total = $total->total;
                    }
                 $total->save();
                 // Update table kematangan
                 $kematangan->parameter_id = $parameter->id;
                 $kematangan->save();
        
               }else{
                // Create table kematangan
                $kematangans = new Kematangan();
                if($dataPendukung->count() > 0){
                    $kematangans->inovasi_masyarakat_id = $request->inovasi_masyarakat_id;
                    $kematangans->indikator_id = $indikator->id;
                    $kematangans->parameter_id = $parameter->id;
                }else{
                    $kematangans->inovasi_masyarakat_id = $request->inovasi_masyarakat_id;
                    $kematangans->indikator_id = $indikator->id;
                    $kematangans->parameter_id = 61;
                }
                $kematangans->save();
        
                // Create or Update table total total kematangan
                $total = TotalKematangan::where('inovasi_masyarakat_id', $request->inovasi_masyarakat_id)->first();
                if(!empty($total)){
                    if($dataPendukung->count() > 0){
                        $total->total = $total->total + $parameter->bobot;
                    }else{
                        // $total->total = $total->total + 0;
                    }
                    $total->save();
                }else{
                    $total = new TotalKematangan();
                    $total->inovasi_masyarakat_id = $request->inovasi_masyarakat_id;
                    if($dataPendukung->count() > 0){
                        $total->total = $parameter->bobot;
                    }else{
                        $total->total = 0;
                    }
                    $total->save();
                }
        
            }
            }else{
                 // Update tota_kematangan inovasi
                 $totalKematangan = TotalKematangan::where('inovasi_masyarakat_id', $request->inovasi_masyarakat_id)->first();
                 $inovasi = InovasiMasyarakat::find($request->inovasi_masyarakat_id);
                 $inovasi->total_kematangan = $totalKematangan->total;
                 $inovasi->save();
                return redirect(route('dashboard.indikator.indexx', $request->inovasi_masyarakat_id));
            }
       }else{
        $kematangan = Kematangan::where('inovasi_masyarakat_id', $request->inovasi_masyarakat_id)->where('indikator_id', $request->indikator_id)->first();
 
         $validateData = $request->validate([
             'parameter_id' => 'required'
         ]);
 
        if(!empty($kematangan)){
          //    Update table total kematangan
          $total = TotalKematangan::where('inovasi_masyarakat_id', $request->inovasi_masyarakat_id)->first();
          if($dataPendukung->count() > 0){
             $total->total = $total->total - $kematangan->parameter->bobot;
             $total->total = $total->total + $parameter->bobot;
             }else{
                 $total->total = $total->total;
             }
          $total->save();
          // Update table kematangan
          $kematangan->parameter_id = $parameter->id;
          $kematangan->save();
 
        }else{
         // Create table kematangan
         $kematangans = new Kematangan();
         if($dataPendukung->count() > 0){
             $kematangans->inovasi_masyarakat_id = $request->inovasi_masyarakat_id;
             $kematangans->indikator_id = $indikator->id;
             $kematangans->parameter_id = $parameter->id;
         }else{
             $kematangans->inovasi_masyarakat_id = $request->inovasi_masyarakat_id;
             $kematangans->indikator_id = $indikator->id;
             $kematangans->parameter_id = 61;
         }
         $kematangans->save();
 
         // Create or Update table total total kematangan
         $total = TotalKematangan::where('inovasi_masyarakat_id', $request->inovasi_masyarakat_id)->first();
         if(!empty($total)){
             if($dataPendukung->count() > 0){
                 $total->total = $total->total + $parameter->bobot;
             }else{
                 // $total->total = $total->total + 0;
             }
             $total->save();
         }else{
             $total = new TotalKematangan();
             $total->inovasi_masyarakat_id = $request->inovasi_masyarakat_id;
             if($dataPendukung->count() > 0){
                 $total->total = $parameter->bobot;
             }else{
                 $total->total = 0;
             }
             $total->save();
         }
 
     }
       }
    // Update tota_kematangan inovasi
    $totalKematangan = TotalKematangan::where('inovasi_masyarakat_id', $request->inovasi_masyarakat_id)->first();
    $inovasi = InovasiMasyarakat::find($request->inovasi_masyarakat_id);
    $inovasi->total_kematangan = $totalKematangan->total;
    $inovasi->save();
    return redirect(route('dashboard.indikator.indexx', $request->inovasi_masyarakat_id));
}

}
