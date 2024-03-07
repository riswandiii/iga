<?php

namespace App\Http\Controllers;

use App\Models\ManualBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManualBookController extends Controller
{
    //

    public function index(Request $request)
    {
        if ($request->search) {
            $datas = ManualBook::where('judul', 'like', '%' . $request->search . '%')->paginate(10);
        } else {
            $datas = ManualBook::paginate(10);
        }
        return view('dashboard.pages.manual_book.index', [
            'page' => 'Manual Book',
            'datas' => $datas
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.manual_book.create', [
            'page' => 'Tambah Manual Book'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required|max:200',
            'file_book' => 'required|mimes:pdf|max:2048'
        ]);
        if($request->file('file_book')){
            $validateData['file_book'] = $request->file('file_book')->store('manual_book');
        }
       ManualBook::create($validateData);
    return redirect(route('dashboard.manual.book'))->with('success', 'Berhasil menambah data!');
    }

    public function edit($id)
    {
        $manualBook = ManualBook::find($id);
        if(!empty($manualBook)){
            return view('dashboard.pages.manual_book.edit', [
                'page' => 'Edit Manual Book',
                'manualBook' => $manualBook
            ]);
        }else{
            return redirect(route('dashboard.manual.book'));
        }
    }

    public function update(Request $request, string $id)
    {
        $manualBook = ManualBook::find($id);
        if($manualBook->file_book){
            $rules = [
                'judul' => 'required|max:200',
            ];
        }else{
            $rules = [
                'judul' => 'required|max:200',
                'file_book' => 'required|mimes:pdf|max:2048'
            ];
        }

        $validateData = $request->validate($rules);
        if($manualBook->file_book){
            if($request->file('file_book')){
                Storage::delete($manualBook->file_book);
                $validateData['file_book'] = $request->file('file_book')->store('manual_book');
            }
        }else{
            if($request->file('file_book')){
                $validateData['file_book'] = $request->file('file_book')->store('manual_book');
            }
        }
        
        ManualBook::where('id', $manualBook->id)->update($validateData);
        return redirect(route('dashboard.manual.book'))->with('success', 'Berhasil mengubah data!');
    }

    public function destroy(string $id)
    {
        $manualBook = ManualBook::find($id);
        if($manualBook->file_book){
            Storage::delete($manualBook->file_book);
        }
        ManualBook::destroy('id', $id);
        return redirect(route('dashboard.manual.book'));
    }


}
