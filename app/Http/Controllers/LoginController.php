<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Institusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        if (auth('institusi')->check()) {
            return redirect('/dashboard');
        }
        return view('institusi.auth.login');
    }
    public function asal()
    {
        return view('asal');
    }
    public function auth(Request $request)
    {
        $cre = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        
        $institusi = Institusi::where('email',$request->email)->first();
        if(!$institusi){
          return back()->with('error', 'Email tidak ditemukan');
            
        }

        if (Auth::guard('institusi')->attempt($cre)) {
            if (!auth('institusi')->user()->email_verified_at) {
                $this->logout($request);
            }
            $request->session()->regenerate();
            if (is_null(auth('institusi')->user()->institusi)) {
                return redirect()->intended('/inputprofil')->with('Succsess', 'Login Berhasil');
            }
            return redirect()->intended('/dashboard')->with('succsess', 'Login Berhasil');
        }
        
        return back()->with('error', 'Password anda salah !!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
