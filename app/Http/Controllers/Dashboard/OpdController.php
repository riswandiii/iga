<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\FooterDashboard;
use App\Models\Opd;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class OpdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Opd $opd, Request $request)
    {
        if ($request->search) {
            $datas = Opd::where('nama_opd', 'like', '%' . $request->search . '%')->paginate(10);
        } else {
            $datas = Opd::paginate(10);
        }
        return view('dashboard.pages.opd.index', [
            'page' => 'Daftar OPD',
            'datas' => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.opd.create', [
            'page' => 'Tambah Daftar OPD'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_opd' => 'required|min:5|max:100'
        ]);
        Opd::create($validateData);
        // return redirect(route('dashboard.opd'))->with('toast_success', 'Berhasil menambah data!');
        return redirect(route('dashboard.opd'))->with('success', 'Berhasil menambah data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Opd $opd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Opd $opd)
    {
        return view('dashboard.pages.opd.edit', [
            'page' => 'Edit Daftar OPD',
            'opd' => $opd
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Opd $opd)
    {
        $rules = [
            'nama_opd' => 'required|min:5|max:100'
        ];
        $validateData = $request->validate($rules);
        Opd::where('id', $opd->id)->update($validateData);
        // return redirect(route('dashboard.opd'))->with('toast_success', 'Berhasil mengedit data!');
        return redirect(route('dashboard.opd'))->with('success', 'Berhasil mengedit data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Opd $opd, $id)
    {
        Opd::destroy('id', $id);
        return redirect(route('dashboard.opd'));
        // return redirect(route('dashboard.opd'))->with('toast_success', 'Berhasil menghapus data!');
    }
}
