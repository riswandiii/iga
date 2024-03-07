<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Opd;
use App\Models\Uptd;
use Illuminate\Http\Request;

class UptdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $datas = Uptd::where('nama_upt', 'like', '%' . $request->search . '%')->paginate(10);
        } else {
            $datas = Uptd::paginate(10);
        }
        return view('dashboard.pages.uptd.index', [
            'page' => 'Daftar UPTD',
            'datas' => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $opd = Opd::all();
        return view('dashboard.pages.uptd.create', [
            'page' => 'Tambah Daftar UPTD',
            'opds' => $opd
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'opd_id' => 'required',
            'nama_upt' => 'required|min:5|max:255'
        ]);
        Uptd::create($validateData);
        return redirect(route('dashboard.uptd'))->with('success', 'Berhasil menambah data!');
        // return redirect(route('dashboard.uptd'))->with('toast_success', 'Berhasil menambah data!');
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
        $uptd = Uptd::where('id', $id)->first();
        $opds = Opd::all();
        return view('dashboard.pages.uptd.edit', [
            'page' => 'Edit Daftar UPTD',
            'uptd' => $uptd,
            'opds' => $opds
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $uptd = Uptd::where('id', $id)->first();
        $rules = [
            'opd_id' => 'required',
            'nama_upt' => 'required|min:5|max:255'
        ];
        $validateData = $request->validate($rules);
        Uptd::where('id', $uptd->id)->update($validateData);
        return redirect(route('dashboard.uptd'))->with('success', 'Berhasil mengedit data!');
        // return redirect(route('dashboard.uptd'))->with('toast_success', 'Berhasil mengedit data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Uptd::destroy('id', $id);
        return redirect(route('dashboard.uptd'));
        // return redirect(route('dashboard.uptd'))->with('toast_success', 'Berhasil menghapus data!');
    }
}
