<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mou;
use App\Models\Dokumen;
use App\Models\Jenis;
use App\Models\Institusi;
use App\Models\Kerjasama;
use App\Models\Perusahaan;
use App\Models\Daftar_mou;
use App\Models\Notifikasi;
use App\Models\Institusi_pimpinan;
use PDF;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class PermohonanController extends Controller
{
    //

    
    public function index(){
        $data['jenis'] = Jenis::all();
        $data['perusahaan'] = Perusahaan::all();
        $data['nama_pimpinan'] = Institusi_pimpinan::where((auth('institusi')->user()->institusi_id))->latest()->first()->nama_pimpinan;
        return view('/Institusi/permohonan/permohonan')->with($data);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'institusi_id' => 'required',
            'perusahaan_id' => 'required',
            'nomor_surat' => 'required',
            'tanggal_mulai' => 'required',
            'status' => 'menunggu'
        ]);
        $validatedData['tanggal_akhir'] = Carbon::parse($validatedData['tanggal_mulai'])->addYears(5);
        $validatedData['institusi_pimpinan_id'] = Institusi_pimpinan::where('institusi_id',$request->institusi_id)->latest()->first()->id;
        $mou = Mou::create($validatedData);
        $validatedData['mou_id'] = $mou->id;
        $dokumen = Dokumen::create([
            'nama_dokumen' => $request->file('dokumen')->store('file'),
            'mou_id' => $mou->id,
            'keterangan' => 'MoU'
        ]);
        
        foreach($request -> daftar as $key => $daftar_mou){
            $daftar = Daftar_mou::create([
                'daftar' => $request->daftar[$key],
                'mou_id' => $mou->id
            ]);
        }
        $institusi = Institusi::find(auth('institusi')->user()->institusi->id);
      

        Notifikasi::create([
            'tanggal' => now(),
            'text' => 'Ada surat pengajuan MoU baru dari ' . $institusi->nama_institusi,
            'status' => AUTH_PENGAJUAN
        ]);
        return redirect('/datapermohonan')->with('succsess','Mou sudah terkirim!');
    }


    public function data(Request $request){
        $mou = Mou::where('institusi_id', auth('institusi')->user()->institusi['id'])->latest()->get();

        return view('/Institusi/permohonan/tabel-permohonan',compact('mou'))->with('i',($request->input('page',1)-1));
    
    }

    // public function detail(){
    //     $data['jenis'] = Jenis::all();
    //     return view('/Institusi/permohonan/detail-permohonan')->with($data);
    // }
    
    public function download($id){
        $mou = Mou::with(['institusi','institusi.institusi_pimpinan','perusahaan'])->find($id);
        $pdf = PDF::loadview('/Institusi/permohonan/mou-pdf',compact('mou'));
        $pdf->setPaper('A4','potrait');
        return $pdf->stream('download-mou.pdf');

    }
    public function detail($id)
    {
        $row = Jenis::find($id);
        $data = [
            'id' => $row->id,
            'jenis' => $row->jenis,
            'gambar' => $row->gambar,
            'isi' => $row->isi
        ];
        $data2 = DB::table('mous')
        ->selectRaw('daftar_mous.id as daftar_mou_id,jenis.id as jenis_id,jenis.isi,jenis.jenis,mous.status,mous.created_at')
        ->join('daftar_mous','daftar_mous.mou_id','=','mous.id')
        ->join('jenis','jenis.id','=','daftar_mous.daftar')
        ->where('institusi_id','=', auth('institusi')->user()->institusi['id'])
        ->where('daftar_mous.daftar','=', $id)
        ->latest()
        ->first();
        return view('/Institusi/permohonan/detail-permohonan', compact('data2','data'));
    }

    public function riwayat($id){
        $riwayat = DB::table('mous')
        ->selectRaw('daftar_mous.id as daftar_mou_id,jenis.id as jenis_id,jenis.isi,jenis.jenis,mous.status,mous.created_at')
        ->join('daftar_mous','daftar_mous.mou_id','=','mous.id')
        ->join('jenis','jenis.id','=','daftar_mous.daftar')
        ->where('institusi_id','=', auth('institusi')->user()->institusi['id'])
        ->where('daftar_mous.daftar','=', $id)
        ->latest()
        ->first();
        return view('/Institusi/permohonan/riwayat',compact('riwayat'));
    }

    public function detailtabel(Request $request, $id)
    {
        $data = Mou::with(['dokumen','daftar_mou','daftar_mou.jenis'])
        ->find($id);
        return view('/Institusi/permohonan/detail', compact('data'));
    }
}
