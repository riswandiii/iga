<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function showFormLogin(){
        return view('pages.login.index');
    }

    public function loginProses(Request $request)
    {
        $captcha = $request->validate([
            'captcha' => 'required|captcha'
        ],
        [
            'captcha.required' => 'Captcha harus diisi.',
            'captcha.captcha' => 'Captcha salah. Silakan coba lagi.',
        ]
    );
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // return redirect()->intended(route('dashboard.index'))->with('toast_success', 'Login Berhasil!');
            return redirect()->intended(route('dashboard.index'));
        }else{
            return redirect(route('login'));
        }
    }

        // Function untuk proses logout
        public function logout(Request $request)
        {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect(route('login'));
        }

        public function reloadCaptcha()
        {
           return response()->json([
                // 'captcha'=>captcha_img('flat')
                'captcha'=>captcha_img('flat')
           ]);
        }

}
