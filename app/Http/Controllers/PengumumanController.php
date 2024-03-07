<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    
    public function index(Request $request)
    {
        if ($request->search) {
            $datas = Pengumuman::where('judul', 'like', '%' . $request->search . '%')->paginate(10);
        } else {
            $datas = Pengumuman::paginate(10);
        }
        return view('dashboard.pages.pengumuman.index', [
            'page' => 'Pengumuman',
            'datas' => $datas
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.pengumuman.create', [
            'page' => 'Tambah Pengumuman'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'tanggal' => 'required',
            'judul' => 'required|max:200',
            'pdf_file' => 'required|mimes:pdf|max:10240'
        ]);
        if($request->file('pdf_file')){
            $validateData['pdf_file'] = $request->file('pdf_file')->store('pengumuman');
        }
       Pengumuman::create($validateData);
    return redirect(route('dashboard.pengumuman'))->with('success', 'Berhasil menambah pengumuman!');
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::find($id);
        if(!empty($pengumuman)){
            return view('dashboard.pages.pengumuman.edit', [
                'page' => 'Edit Pengumuman',
                'pengumuman' => $pengumuman
            ]);
        }else{
            return redirect(route('dashboard.pengumuman'));
        }
    }

    public function update(Request $request, string $id)
    {
        $pengumuman = Pengumuman::find($id);
        if($pengumuman->pdf_file){
            $rules = [
                'tanggal' => 'required',
                'judul' => 'required|max:200',
            ];
        }else{
            $rules = [
                'tanggal' => 'required',
                'judul' => 'required|max:200',
                'pdf_file' => 'required|mimes:pdf|max:10240'
            ];
        }

        $validateData = $request->validate($rules);
        if($pengumuman->pdf_file){
            if($request->file('pdf_file')){
                Storage::delete($pengumuman->pdf_file);
                $validateData['pdf_file'] = $request->file('pdf_file')->store('pengumuman');
            }
        }else{
            if($request->file('pdf_file')){
                $validateData['pdf_file'] = $request->file('pdf_file')->store('pengumuman');
            }
        }
        
        Pengumuman::where('id', $pengumuman->id)->update($validateData);
        return redirect(route('dashboard.pengumuman'))->with('success', 'Berhasil mengubah pengumuman!');
    }

    public function destroy(string $id)
    {
        $pengumuman = Pengumuman::find($id);
        if($pengumuman->pdf_file){
            Storage::delete($pengumuman->pdf_file);
        }
        Pengumuman::destroy('id', $id);
        return redirect(route('dashboard.pengumuman'));
    }

}
