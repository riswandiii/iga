<?php

namespace App\Http\Controllers;

use App\Models\HarapPerhatikan;
use Illuminate\Http\Request;

class HarapPerhatikanController extends Controller
{
    //
    public function index()
    {
       
        return view('dashboard.pages.perhatikan.index', [
            'page' => 'Harap Perhatikan',
            'datas' => HarapPerhatikan::all()
        ]);
    }

    public function edit($id)
    {
        $perhatikan = HarapPerhatikan::find($id);
        if(!empty($perhatikan)){
            return view('dashboard.pages.perhatikan.edit', [
                'page' => 'Edit Harap Perhatikan',
                'perhatikan' => $perhatikan
            ]);
        }else{
            return redirect(route('dashboard.perhatikan'));
        }
    }

    public function update(Request $request, $id)
    {
        $perhatikan = HarapPerhatikan::find($id);
        $rules = [
            'isi' => 'required'
        ];
        $validateData = $request->validate($rules);
        HarapPerhatikan::where('id', $perhatikan->id)->update($validateData);
        // return redirect(route('dashboard.opd'))->with('toast_success', 'Berhasil mengedit data!');
        return redirect(route('dashboard.perhatikan'))->with('success', 'Berhasil mengedit data!');
    }

}
