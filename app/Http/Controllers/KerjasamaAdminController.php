<?php

namespace App\Http\Controllers;
use App\Models\Institut;
use App\Models\Jenis;
use App\Models\Dokumen;
use App\Models\Kerjasama;
use App\Models\Perusahaan;
use App\Models\Peserta;
use App\Models\Daftar_mou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KerjasamaAdminController extends Controller
{
    //
    public function kerjasama(Request $request)
    {
        $daftar_mou = Daftar_mou::with(['kerjasama','mou','mou.institusi','jenis','mou.daftar_mou'])
        ->whereHas('kerjasama')
        ->latest()
        ->get();
        return view('/Admin/kerjasama/tabel-kerjasama',compact('daftar_mou'))->with('i',($request->input('page',1)-1));
    }
    public function riwayatkerjasama(){
        return view('/Admin/kerjasama/riwayat-kerjasama');
    }

    public function hapus($id)
    {
        Kerjasama::where('id', '=', $id)->delete();
        return back()->with('sucsess', 'data berhasil dihapus!');
    }

    public function detail(Request $request, $id)
    {
        $data = Daftar_mou::with(['kerjasama','kerjasama.peserta','kerjasama.dokumen','kerjasama.perusahaan'])
        ->find($id);
        return view('/Admin/kerjasama/detail-pkl', compact('data'));
    }

    public function detailkurikulum(Request $request, $id)
    {
        $data = Daftar_mou::with(['kerjasama','kerjasama.dokumen','kerjasama.perusahaan'])
        ->find($id);
        return view('/Admin/kerjasama/detail-kurikulum', compact('data'));
    }

    public function detailteaching(Request $request, $id)
    {
        $data = Daftar_mou::with(['kerjasama','kerjasama.dokumen','kerjasama.perusahaan'])
        ->find($id);
        return view('/Admin/kerjasama/detail-teaching', compact('data'));
    }

    public function detailgurutamu(Request $request, $id)
    {
        $data = Daftar_mou::with(['kerjasama','kerjasama.dokumen','kerjasama.perusahaan'])
        ->find($id);
        return view('/Admin/kerjasama/detail-gurutamu', compact('data'));
    }

    public function detailkunjin(Request $request, $id)
    {
        $data = Daftar_mou::with(['kerjasama','kerjasama.dokumen','kerjasama.perusahaan'])
        ->find($id);
        return view('/Admin/kerjasama/detail-kunjin', compact('data'));
    }

    public function detailujikom(Request $request, $id)
    {
        $data = Daftar_mou::with(['kerjasama','kerjasama.dokumen','kerjasama.perusahaan'])
        ->find($id);
        return view('/Admin/kerjasama/detail-ujikom', compact('data'));
    }

    public function detailrekrut(Request $request, $id)
    {
        $data = Daftar_mou::with(['kerjasama','kerjasama.dokumen','kerjasama.perusahaan'])
        ->find($id);
        return view('/Admin/kerjasama/detail-rekrut', compact('data'));
    }

    public function detailmagang(Request $request, $id)
    {
        $data = Daftar_mou::with(['kerjasama','kerjasama.dokumen','kerjasama.perusahaan'])
        ->find($id);
        return view('/Admin/kerjasama/detail-magang', compact('data'));
    }

    public function detailsuvervisi(Request $request, $id)
    {
        $data = Daftar_mou::with(['kerjasama','kerjasama.dokumen','kerjasama.perusahaan'])
        ->find($id);
        return view('/Admin/kerjasama/detail-suvervisi', compact('data'));
    }

}
