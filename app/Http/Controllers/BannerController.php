<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
   

    public function index()
    {
        return view('dashboard.pages.banner.index', [
            'page' => 'Banner',
            'datas' => Banner::paginate(10)
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.banner.create', [
            'page' => 'Tambah Banner'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'banner' => 'required|image|max:2048',
        ]);
        if($request->file('banner')){
            $validateData['banner'] = $request->file('banner')->store('banner');
        }
       Banner::create($validateData);
       return redirect(route('dashboard.banner'))->with('success', 'Berhasil menambah data!');
    }

    public function edit($id)
    {
        $banner = Banner::find($id);
        if(!empty($banner)){
            return view('dashboard.pages.banner.edit', [
                'page' => 'Edit Banner',
                'banner' => $banner
            ]);
        }else{
            return redirect(route('dashboard.banner'));
        }
    }

    public function update(Request $request, string $id)
    {
        $banner = Banner::find($id);
        if($banner->banner){
            $rules = [
                'banner' => 'required|image|max:2048',
            ];
        }else{
            $rules = [
                'banner' => 'required|image|max:2048',
            ];
        }

        $validateData = $request->validate($rules);
        if($banner->banner){
            if($request->file('banner')){
                Storage::delete($banner->banner);
                $validateData['banner'] = $request->file('banner')->store('banner');
            }
        }else{
            if($request->file('banner')){
                $validateData['banner'] = $request->file('banner')->store('banner');
            }
        }
        
        Banner::where('id', $banner->id)->update($validateData);
        return redirect(route('dashboard.banner'))->with('success', 'Berhasil mengubah data!');
    }

    public function destroy(string $id)
    {
        $banner = Banner::find($id);
        if($banner->banner){
            Storage::delete($banner->banner);
        }
        Banner::destroy('id', $id);
        return redirect(route('dashboard.banner'));
    }


}
