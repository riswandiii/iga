<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Opd;
use App\Models\Role;
use App\Models\Uptd;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HitungMundur;
use App\Models\Inisiator_Inovasi_Daerah;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $datas = User::where('nama_lengkap', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->paginate(10);
        } else {
            $datas = User::paginate(10);
        }
        return view('dashboard.pages.account.index', [
            'page' => 'Daftar Akun',
            'datas' => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $opd = Opd::all();
        // $roles = Role::all();
        return view('dashboard.pages.account.create', [
            'page' => 'Tambah Daftar Akun',
            'opds' => $opd,
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'role' => 'required',
            'opd_id' => '',
            'nama_inisiator' => '',
            'nama_panggilan' => 'required',
            'no_hp' => 'required|numeric|digits:12|unique:users',
            'username' => [
                'required',
                'regex:/^[a-z._0-9]+$/'
            ],
            'password' => 'required'
        ], [
            'no_hp' =>'no handphone sudah terdaftar!',
            'username' => 'Tidak boleh menggunakan spasi atau huruf kapital!'
        ]);
        $validateData['password'] = bcrypt($validateData['password']);
        User::create($validateData);
        return redirect(route('dashboard.account'))->with('success', 'Berhasil Membuat Akun!');
        // return redirect(route('dashboard.account'))->with('toast_success', 'Berhasil membuat akun!');
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
        $user = User::where('id', $id)->first();
        $inisiators = Inisiator_Inovasi_Daerah::all();
        // $roles = Role::all();
        if(!empty($user)){
            $opds = Opd::all();
            return view('dashboard.pages.account.edit', [
                'page' => 'Edit Daftar Akun',
                'user' => $user,
                // 'roles' => $roles,
                'opds' => $opds,
                'inisiators' => $inisiators
            ]);
        }else{
            return redirect(route('dashboard.account'))->with('error', 'Akun tidak ditemukan!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::where('id', $id)->first();
        if ($user->email == $request->email) {
            $rules = [
                'role' => 'required',
                'opd_id' => '',
                'nama_inisiator' => '',
                'nama_panggilan' => 'required|min:5|max:255',
                'no_hp' => 'required|numeric|digits:12|unique:users',
                'username' => [
                    'required',
                    'regex:/^[a-z._0-9]+$/'
                ],
                'password' => ''
            ];
        } else {
            $rules = [
                'role' => 'required',
                'opd_id' => '',
                'nama_inisiator' => '',
                'nama_panggilan' => 'required|min:5|max:255',
                'no_hp' => 'required|numeric|digits:12|unique:users',
                'username' => [
                    'required',
                    'regex:/^[a-z._0-9]+$/'
                ],
                'password' => ''
            ];
        }
        $validateData = $request->validate($rules, [
            'no_hp' =>'no handphone sudah terdaftar!',
            'username' => 'Tidak boleh menggunakan spasi atau huruf kapital!',
            'nama_panggilan' => 'The nama penanggung jawab field must be at least 5 characters.' 
        ]);
        if ($request->password) {
            $validateData['password'] = bcrypt($validateData['password']);
        } else {
            $validateData['password'] = $user->password;
        }
        User::where('id', $user->id)->update($validateData);
        return redirect(route('dashboard.account'))->with('success', 'Berhasil Mengubah Akun!');
        // return redirect(route('dashboard.account'))->with('toast_success', 'Berhasil mengubah akun!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $hitungMundur = HitungMundur::where('user_id', $id)->first();
        if(!empty($hitungMundur)){
            $hitungMundur->delete();
        }
        User::destroy('id', $id);
        return redirect(route('dashboard.account'));
        // return redirect(route('dashboard.account'))->with('toast_success', 'Berhasil menghapus data!');
    }

    // public function provinsi()
    // {
    //     $data = Opd::where('nama_opd', 'LIKE', '%' .request('q').'%')->paginate(10);
    //     return response()->json($data);
    // }

    // public function regency($id)
    // {
    //     $data = Opd::where('opd_id', $id)->where('nama_opd', 'LIKE', '%' .request('q').'%')->paginate(10);
    //     return response()->json($data);
    // }


}