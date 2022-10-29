<?php

namespace App\Http\Controllers;

use App\Models\Institusi;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mou;
use App\Models\Kerjasama;
use App\Models\Daftar_mou;
use Carbon\Carbon;



class InstitusiController extends Controller
{
    //
    public function index()
    {
        return view('/Institusi/institusi');
    }

    public function kalender(Request $id)
    {
        $mou = Mou::with(['institusi'])
            ->selectRaw('mous.id,mous.institusi_id,mous.tanggal_akhir,mous.tanggal_mulai,mous.status')
            ->where('institusi_id', auth('institusi')->user()->institusi['id'],'status' == 1)
            ->get();
        
            // $kerjasama = Kerjasama::with(['institusi'])
            // ->where('institusi_id', auth('institusi')->user()->institusi['id'] )
            // ->get();

            $kerjasama = Daftar_mou::with(['kerjasama','kerjasama.peserta','mou','mou.institusi','jenis','mou.daftar_mou','mou.perusahaan'])->whereHas('mou',function($query){
                $query->where('institusi_id', auth('institusi')->user()->institusi['id']);
            })
            ->whereHas('kerjasama')
            ->latest()
            ->get();
            
        $tanggal =
            Mou::with(['institusi'])
            ->selectRaw('mous.id,mous.institusi_id,mous.tanggal_akhir,mous.tanggal_mulai')
            ->where('institusi_id', auth('institusi')->user()->institusi['id'])
            ->first();
        $akhir = null;
        if ($tanggal) {
            $akhir = new Carbon($tanggal->tanggal_akhir);
        }
        $deff = Carbon::parse(Carbon::now())->diffInYears($akhir);
        $event = [];
        // dd($kerjasama);
        return view('/Institusi/kalender', compact('mou', 'deff', 'tanggal','kerjasama'))->with($event);
    }

    public function dashboard()
    {
        return view('/institusi/sidebar/dashboard');
    }
}