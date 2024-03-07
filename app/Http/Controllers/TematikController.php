<?php

namespace App\Http\Controllers;

use App\Models\Tematik;
use Illuminate\Http\Request;

class TematikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Tematik $tematik, Request $request)
    {
        if ($request->search) {
            $datas = Tematik::where('tematik', 'like', '%' . $request->search . '%')->paginate(10);
        } else {
            $datas = Tematik::paginate(10);
        }
        return view('dashboard.pages.tematik.index', [
            'page' => 'Daftar Tematik',
            'datas' => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.tematik.create', [
            'page' => 'Tambah Daftar Tematik'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'tematik' => 'required|min:5|max:100'
        ]);
        Tematik::create($validateData);
        // return redirect(route('dashboard.tematik'))->with('toast_success', 'Berhasil menambah data!');
        return redirect(route('dashboard.tematik'))->with('success', 'Berhasil menambah data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tematik $tematik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tematik $tematik)
    {
        return view('dashboard.pages.tematik.edit', [
            'page' => 'Edit Daftar Tematik',
            'tematik' => $tematik
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tematik $tematik)
    {
        $rules = [
            'tematik' => 'required|min:5|max:100'
        ];
        $validateData = $request->validate($rules);
        Tematik::where('id', $tematik->id)->update($validateData);
        // return redirect(route('dashboard.tematik'))->with('toast_success', 'Berhasil mengedit data!');
        return redirect(route('dashboard.tematik'))->with('success', 'Berhasil mengedit data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tematik $tematik, $id)
    {
        Tematik::destroy('id', $id);
        return redirect(route('dashboard.tematik'));
        // return redirect(route('dashboard.tematik'))->with('toast_success', 'Berhasil menghapus data!');
    }
}
