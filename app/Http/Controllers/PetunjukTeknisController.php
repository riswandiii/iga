<?php

namespace App\Http\Controllers;

use App\Models\PetunjukTekni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetunjukTeknisController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search) {
            $datas = PetunjukTekni::where('judul', 'like', '%' . $request->search . '%')->paginate(10);
        } else {
            $datas = PetunjukTekni::paginate(10);
        }
        return view('dashboard.pages.petunjuk_teknis.index', [
            'page' => 'Petunjuk Teknis',
            'datas' => $datas
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.petunjuk_teknis.create', [
            'page' => 'Tambah Petunjuk Teknis'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required|max:200',
            'file_petunjuk' => 'required|mimes:pdf|max:2048'
        ]);
        if($request->file('file_petunjuk')){
            $validateData['file_petunjuk'] = $request->file('file_petunjuk')->store('petunjuk_teknis');
        }
       PetunjukTekni::create($validateData);
    return redirect(route('dashboard.petunjuk.teknis'))->with('success', 'Berhasil menambah data!');
    }

    public function edit($id)
    {
        $petunjukTeknis = PetunjukTekni::find($id);
        if(!empty($petunjukTeknis)){
            return view('dashboard.pages.petunjuk_teknis.edit', [
                'page' => 'Edit Petunjuk Teknis',
                'petunjukTeknis' => $petunjukTeknis
            ]);
        }else{
            return redirect(route('dashboard.petunjuk.teknis'));
        }
    }

    public function update(Request $request, string $id)
    {
        $petunjukTeknis = PetunjukTekni::find($id);
        if($petunjukTeknis->file_petunjuk){
            $rules = [
                'judul' => 'required|max:200',
            ];
        }else{
            $rules = [
                'judul' => 'required|max:200',
                'file_petunjuk' => 'required|mimes:pdf|max:2048'
            ];
        }

        $validateData = $request->validate($rules);
        if($petunjukTeknis->file_petunjuk){
            if($request->file('file_petunjuk')){
                Storage::delete($petunjukTeknis->file_petunjuk);
                $validateData['file_petunjuk'] = $request->file('file_petunjuk')->store('petunjuk_teknis');
            }
        }else{
            if($request->file('file_petunjuk')){
                $validateData['file_petunjuk'] = $request->file('file_book')->store('petunjuk_teknis');
            }
        }
        
        PetunjukTekni::where('id', $petunjukTeknis->id)->update($validateData);
        return redirect(route('dashboard.petunjuk.teknis'))->with('success', 'Berhasil mengubah data!');
    }

    public function destroy(string $id)
    {
        $petunjukTeknis = PetunjukTekni::find($id);
        if($petunjukTeknis->file_petunjuk){
            Storage::delete($petunjukTeknis->file_petunjuk);
        }
        PetunjukTekni::destroy('id', $id);
        return redirect(route('dashboard.petunjuk.teknis'));
    }

}
