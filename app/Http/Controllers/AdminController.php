<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Institusi;
use App\Models\Mou;
use App\Models\Kerjasama;
use App\Models\Perusahaan;
use App\Models\Dokumen;
use App\Models\Notifikasi;
use App\Models\Daftar_mou;
use Carbon\Carbon;

class AdminController extends Controller
{
    //
    public function login(){
        if(auth('admin')->check()){
            return redirect('dashboard-admin');
        }
        return view('/admin/auth/loginadmin');
    }
    public function auth(Request $request)
    {
        $cre = $request->validate([
            'email' => ['required','email'],
            'password' =>['required']
        ]);
        if (Auth::guard('admin')->attempt($cre)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard-admin')->with ('succsess','Login Berhasil');
        }
        return back()->with('error', 'Login Anda Gagal');

    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/loginadmin');
    }


    public function index(){
        $institusi = Institusi::count();
        $mou = Mou::count();
        $kerjasama = Kerjasama::count();
        $notifikasi = Notifikasi::latest()->limit(7)->get();
        return view('/Admin/dashboard-admin',compact('institusi','mou','kerjasama','notifikasi'));
    }

    public function kalender(Request $id)
    {
       
        $mou = Mou::with(['institusi'])
            ->selectRaw('mous.id,mous.institusi_id,mous.tanggal_akhir,mous.tanggal_mulai,mous.status')
          
            ->get();
        
            $kerjasama = Daftar_mou::with(['kerjasama','kerjasama.peserta','mou','mou.institusi','jenis','mou.daftar_mou','mou.perusahaan'])->whereHas('mou')
                ->whereHas('kerjasama')
                ->latest()
                ->get();
            
            
        $tanggal =
            Mou::with(['institusi'])
            ->selectRaw('mous.id,mous.institusi_id,mous.tanggal_akhir,mous.tanggal_mulai')
           
            ->first();
        $akhir = null;
        if ($tanggal) {
            $akhir = new Carbon($tanggal->tanggal_akhir);
        }
        $deff = Carbon::parse(Carbon::now())->diffInYears($akhir);
        $event = [];
        return view('/Admin/kalender-admin',compact('mou','tanggal','kerjasama','deff'))->with($event);
    }

    public function dokument(Request $request){
        $dokumen = Dokumen::whereHas('mou')->latest()->get();
        return view('/Admin/dokument',compact('dokumen'))->with('i',($request->input('page',1)-1));
    }


    
    public function riwayat(){
        return view('riwayat');
    }
    public function dataprofil(){
        $data['admin'] = Admin::all();
        return view('/Admin/profil/editprofil')->with($data);
    }

    public function profiledit($id)
    {
        $row = Admin::find($id);
        $data = [
            'id' => $row->id,
            'nama_admin' => $row->nama_admin,
            'email' => $row->email,
            'password' => $row->village_id,

        ];
        return view('/Admin/profil/profil-admin', $data);
    }
    public function update($id, Request $request)
    {
        $data = [
            'nama_admin' => $request->nama_admin,
            'email' => $request->email,
            'password' => $request->password
        ];
        Admin::where('id', $id)->update($data);
        return redirect('/admin/profil-admin' . $id);
    }

    
    public function perusahaanedit($id)
    {
        $row = Perusahaan::find($id);
        $data = [
            'id' => $row->id,
            'nama_perusahaan' => $row->nama_perusahaan,
            'alamat_perusahaan' => $row->alamat_perusahaan,
            'nama_pimpinan' => $row->nama_pimpinan,
            'telepon' =>  $row->telepon,
            'logo' => $row->logo,
            'website' => $row->website

        ];
        return view('/Admin/profil/profil-perusahaan', $data);
    }
    public function perusahaanupdate($id, Request $request)
    {
        $data = [
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'nama_pimpinan' => $request->nama_pimpinan,
            'telepon' =>  $request->telepon,
            'website' => $request->website,
        ];
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('image');
        }
        Perusahaan::where('id', $id)->update($data);
        return redirect('/admin/profil-perusahaan' . $id);
    }
    public function hapus($id)
    {
        Dokumen::where('id', '=', $id)->delete();
        return back()->with('sucsess', 'data berhasil dihapus!');
    }

}
