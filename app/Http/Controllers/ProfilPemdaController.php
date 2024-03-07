<?php

namespace App\Http\Controllers;

use App\Models\ProfilPemda;
use Illuminate\Http\Request;

class ProfilPemdaController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.pages.profil_pemda.index', [
            'page' => 'Profil Pemda',
            'data' => ProfilPemda::all()
        ]);
    }
}
