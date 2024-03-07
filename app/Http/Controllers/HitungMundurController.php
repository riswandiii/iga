<?php

namespace App\Http\Controllers;

use App\Models\HitungMundur;
use App\Models\User;
use Illuminate\Http\Request;

class HitungMundurController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->search) {
            $datas = HitungMundur::where('tanggal', 'like', '%' . $request->search . '%')->paginate(10);
        } else {
            $datas = HitungMundur::paginate(10);
        }
        return view('dashboard.pages.hitung_mundur.index', [
            'page' => 'Batas Penginputan Inovasi',
            'datas' => $datas
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.hitung_mundur.create', [
            'page' => 'Tambah Batas  Penginputan Inovasi'
            // 'users' => User::all()
        ],);
    }

    public function store(Request $request)
    {
        $users = User::all();
        $validateData = $request->validate([
            'tanggal' => 'required'
        ]);


        $hitungMundurs = HitungMundur::all();
        HitungMundur::destroy($hitungMundurs);

        foreach ($users as $user ) {
           $item = new HitungMundur();
           $item->user_id = $user->id;
           $item->tanggal = $request->tanggal;
           $item->save(); 
        }

        // HitungMundur::create($validateData);
        // // return redirect(route('dashboard.opd'))->with('toast_success', 'Berhasil menambah data!');
        return redirect(route('dashboard.hitung'))->with('success', 'Berhasil menambah data!');
    }

    public function edit($id)
    {
        $data = HitungMundur::find($id);
        $users = User::all();
        return view('dashboard.pages.hitung_mundur.edit', [
            'page' => 'Edit Batas Penginputan Inovasi',
            'data' => $data,
            'users' => $users
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = HitungMundur::where('id', $id)->first();
        
        if($data->user_id == $request->user_id){
            $rules = [
                'tanggal' => 'required'
            ];
        }else{
            $rules = [
                'tanggal' => 'required'
            ];
        }
        $validateData = $request->validate($rules);
        HitungMundur::where('id', $data->id)->update($validateData);
        // return redirect(route('dashboard.opd'))->with('toast_success', 'Berhasil mengedit data!');
        return redirect(route('dashboard.hitung'))->with('success', 'Berhasil mengubah data!');
    }

    public function destroy($id)
    {
        HitungMundur::destroy('id', $id);
        return redirect(route('dashboard.hitung'));
        // return redirect(route('dashboard.opd'))->with('toast_success', 'Berhasil menghapus data!');
    }

}
