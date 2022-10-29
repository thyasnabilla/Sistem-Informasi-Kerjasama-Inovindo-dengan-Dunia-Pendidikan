<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Mou;
use App\Models\Kerjasama;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function dashboard()
    {
        $jenis  = Jenis::all();
        $mou = Mou::where('institusi_id', auth('institusi')->user()->institusi['id'])->count();
        $kerjasama = Kerjasama::where('institusi_id', auth('institusi')->user()->institusi['id'])->whereHas('institusi')->count();
        
        
        return view('/institusi/sidebar/dashboard',compact('mou','kerjasama','jenis'));
    }
}
