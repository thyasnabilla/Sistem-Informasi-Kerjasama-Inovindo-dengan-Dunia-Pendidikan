<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institusi;
use App\Models\Jenis;
use App\Models\Dokumen;
use App\Models\User;
use App\Models\Kerjasama;
use App\Models\Perusahaan;
use App\Models\Peserta;
use App\Models\Daftar_mou;
use Illuminate\Support\Facades\DB;


class KerjasamaController extends Controller
{
    //
    public function index(Request $request)
    {
        $daftar_mou = Daftar_mou::with(['kerjasama','kerjasama.peserta','mou','mou.institusi','jenis','mou.daftar_mou','mou.perusahaan'])->whereHas('mou',function($query){
            $query->where('institusi_id', auth('institusi')->user()->institusi['id']);
        })
        ->whereHas('kerjasama')
        ->latest()
        ->get();
        return view('/Institusi/kerjasama/daftarkerjasama',compact('daftar_mou'))->with('i',($request->input('page',1)-1));
    }


    public function riwayat()
    {
        return view('/Institusi/kerjasama/riwayat');
    }

    
    public function input()
    {
        $post['perusahaan'] = Perusahaan::all();
        return view('/Institusi/kerjasama/form-kerjasama',$post);
    }
    public function simpan(Request $request)
    {
        $validatedData = $request->validate([
            'institusi_id' => 'required',
            'perusahaan_id' => 'required',
            'daftar_mou_id' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required'
        ]);
        $kerjasama = Kerjasama::create($validatedData);
        $dokumen = Dokumen::create([
            'nama_dokumen' => $request->file('dokumen1')->store('file'),
            'kerjasama_id' => $kerjasama->id,
            'keterangan' => 'Surat Pengajuan'
        ]);
        $validatedData['kerjasama_id'] = $kerjasama->id;
        $validatedData['dokumen_id'] = $dokumen->id;

        foreach($request->nama_peserta as $key => $nama){
            if ( $request->nama_peserta[$key] != '') {
                # code...
                $peserta = Peserta::create([
                    'kerjasama_id' => $kerjasama->id,
                    'nama_peserta' => $request->nama_peserta[$key],
                    'nomor_induk' => $request->nomor_induk[$key],
                    'jenis_kelamin' => $request->jenis_kelamin[$key],
                    'no_hp' => $request->no_hp[$key],
                    'status' => $request->status[$key],
                    'dokumen_id' => $dokumen->id,
                ]);
            }
            
        }
        return redirect('/dashboard')->with('success', 'Form sudah diisi!');
    }

        
    public function detail(Request $request, $id)
    {
        $data = Daftar_mou::with(['kerjasama','kerjasama.peserta','kerjasama.dokumen','kerjasama.perusahaan'])
        ->find($id);
        return view('/Institusi/kerjasama/detail-kerjasama', compact('data'));
    }

    public function detailkurikulum(Request $request, $id)
    {
        $data = Daftar_mou::with(['kerjasama','kerjasama.dokumen','kerjasama.perusahaan'])
        ->find($id);
        return view('/Institusi/kerjasama/detail-kurikulum', compact('data'));
    }

    public function detailteaching(Request $request, $id)
    {
        $data = Daftar_mou::with(['kerjasama','kerjasama.dokumen','kerjasama.perusahaan'])
        ->find($id);
        return view('/Institusi/kerjasama/detail-teaching', compact('data'));
    }

    public function detailgurutamu(Request $request, $id)
    {
        $data = Daftar_mou::with(['kerjasama','kerjasama.dokumen','kerjasama.perusahaan'])
        ->find($id);
        return view('/Institusi/kerjasama/detail-guru-tamu', compact('data'));
    }

    public function detailkunjin(Request $request, $id)
    {
        $data = Daftar_mou::with(['kerjasama','kerjasama.dokumen','kerjasama.perusahaan'])
        ->find($id);
        return view('/Institusi/kerjasama/detail-kunjin', compact('data'));
    }

    public function detailujikom(Request $request, $id)
    {
        $data = Daftar_mou::with(['kerjasama','kerjasama.dokumen','kerjasama.perusahaan'])
        ->find($id);
        return view('/Institusi/kerjasama/detail-ujikom', compact('data'));
    }

    public function detailrekrut(Request $request, $id)
    {
        $data = Daftar_mou::with(['kerjasama','kerjasama.dokumen','kerjasama.perusahaan'])
        ->find($id);
        return view('/Institusi/kerjasama/detail-rekrut', compact('data'));
    }

    public function detailmagang(Request $request, $id)
    {
        $data = Daftar_mou::with(['kerjasama','kerjasama.dokumen','kerjasama.perusahaan'])
        ->find($id);
        return view('/Institusi/kerjasama/detail-magang', compact('data'));
    }

    public function detailsuvervisi(Request $request, $id)
    {
        $data = Daftar_mou::with(['kerjasama','kerjasama.dokumen','kerjasama.perusahaan'])
        ->find($id);
        return view('/Institusi/kerjasama/detail-suvervisi', compact('data'));
    }



    
     public function inputteaching(){
        $post['perusahaan'] = Perusahaan::all();
        return view('/Institusi/kerjasama/form-teaching',$post);
     }
     public function simpanteaching(Request $request){
        $validatedData = $request->validate([
            'institusi_id' => 'required',
            'perusahaan_id' => 'required',
            'daftar_mou_id' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required'
        ]);
        $kerjasama = Kerjasama::create($validatedData);
        $validatedData['kerjasama_id'] = $kerjasama->id;
        if ($request->hasFile('dokumen1')) {
            $dokumen = Dokumen::create([
                'nama_dokumen' => $request->file('dokumen1')->store('file'),
                'kerjasama_id' => $kerjasama->id,
                'keterangan' => 'Surat Pengajuan'
            ]);
        }
        if($request->hasFile('dokumen2')) {
            $dokumen = Dokumen::create([
                'nama_dokumen' => $request->file('dokumen2')->store('file'),
                'kerjasama_id' => $kerjasama->id,
                'keterangan' => 'RAB'
            ]);
        }
        return redirect('/dashboard')->with('success', 'Form sudah diisi!');
     }



     public function inputgurutamu(){
        $post['perusahaan'] = Perusahaan::all();
        return view('/Institusi/kerjasama/form-guru-tamu',$post);
     }
     public function simpangurutamu(Request $request){
        $validatedData = $request->validate([
            'institusi_id' => 'required',
            'perusahaan_id' => 'required',
            'daftar_mou_id' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required'
        ]);
        $kerjasama = Kerjasama::create($validatedData);
        $validatedData['kerjasama_id'] = $kerjasama->id;
        if ($request->hasFile('dokumen1')) {
            $dokumen = Dokumen::create([
                'nama_dokumen' => $request->file('dokumen1')->store('file'),
                'kerjasama_id' => $kerjasama->id,
                'keterangan' => 'Surat Pengajuan'
            ]);
        }
        if($request->hasFile('dokumen2')) {
            $dokumen = Dokumen::create([
                'nama_dokumen' => $request->file('dokumen2')->store('file'),
                'kerjasama_id' => $kerjasama->id,
                'keterangan' => 'RAB'
            ]);
        }
        return redirect('/dashboard')->with('success', 'Form sudah diisi!');
     }
    



     public function inputkunjin(){
        $post['perusahaan'] = Perusahaan::all();
        return view('/Institusi/kerjasama/form-kunjin',$post);
     }
     public function simpankunjin(Request $request){
        $validatedData = $request->validate([
            'institusi_id' => 'required',
            'perusahaan_id' => 'required',
            'daftar_mou_id' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required'
        ]);
        $kerjasama = Kerjasama::create($validatedData);
        $validatedData['kerjasama_id'] = $kerjasama->id;
        if ($request->hasFile('dokumen1')) {
            $dokumen = Dokumen::create([
                'nama_dokumen' => $request->file('dokumen1')->store('file'),
                'kerjasama_id' => $kerjasama->id,
                'keterangan' => 'Surat Pengajuan'
            ]);
        }
        if($request->hasFile('dokumen2')) {
            $dokumen = Dokumen::create([
                'nama_dokumen' => $request->file('dokumen2')->store('file'),
                'kerjasama_id' => $kerjasama->id,
                'keterangan' => 'RAB'
            ]);
        }
        return redirect('/dashboard')->with('success', 'Form sudah diisi!');
     }
    

     public function inputkurikulum(){
        $post['perusahaan'] = Perusahaan::all();
        return view('/Institusi/kerjasama/form-kurikulum',$post);
     }
     public function simpankurikulum(Request $request){
        $validatedData = $request->validate([
            'institusi_id' => 'required',
            'perusahaan_id' => 'required',
            'daftar_mou_id' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required'
        ]);
        $kerjasama = Kerjasama::create($validatedData);
        $validatedData['kerjasama_id'] = $kerjasama->id;
        if ($request->hasFile('dokumen1')) {
            $dokumen = Dokumen::create([
                'nama_dokumen' => $request->file('dokumen1')->store('file'),
                'kerjasama_id' => $kerjasama->id,
                'keterangan' => 'Surat Pengajuan'
            ]);
        }
        if($request->hasFile('dokumen2')) {
            $dokumen = Dokumen::create([
                'nama_dokumen' => $request->file('dokumen2')->store('file'),
                'kerjasama_id' => $kerjasama->id,
                'keterangan' => 'RAB'
            ]);
        }
        if($request->hasFile('dokumen3')) {
            $dokumen = Dokumen::create([
                'nama_dokumen' => $request->file('dokumen3')->store('file'),
                'kerjasama_id' => $kerjasama->id,
                'keterangan' => 'Randon Acara'
            ]);
        }
        return redirect('/dashboard')->with('success', 'Form sudah diisi!');
     }


     public function inputujikom(){
        $post['perusahaan'] = Perusahaan::all();
        return view('/Institusi/kerjasama/form-ujikom',$post);
     }
     public function simpanujikom(Request $request){
        $validatedData = $request->validate([
            'institusi_id' => 'required',
            'perusahaan_id' => 'required',
            'daftar_mou_id' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required'
        ]);
        $kerjasama = Kerjasama::create($validatedData);
        $validatedData['kerjasama_id'] = $kerjasama->id;
        if ($request->hasFile('dokumen1')) {
            $dokumen = Dokumen::create([
                'nama_dokumen' => $request->file('dokumen1')->store('file'),
                'kerjasama_id' => $kerjasama->id,
                'keterangan' => 'Surat Pengajuan'
            ]);
        }
        if($request->hasFile('dokumen2')) {
            $dokumen = Dokumen::create([
                'nama_dokumen' => $request->file('dokumen2')->store('file'),
                'kerjasama_id' => $kerjasama->id,
                'keterangan' => 'RAB'
            ]);
        }
        return redirect('/dashboard')->with('success', 'Form sudah diisi!');
     }

     public function inputrekrut(){
        $post['perusahaan'] = Perusahaan::all();
        return view('/Institusi/kerjasama/form-rekrut',$post);
     }
     public function simpanrekrut(Request $request){
        $validatedData = $request->validate([
            'institusi_id' => 'required',
            'perusahaan_id' => 'required',
            'daftar_mou_id' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required'
        ]);
        $kerjasama = Kerjasama::create($validatedData);
        $validatedData['kerjasama_id'] = $kerjasama->id;
        $dokumen = Dokumen::create([
            'nama_dokumen' => $request->file('dokumen1')->store('file'),
            'kerjasama_id' => $kerjasama->id,
            'keterangan' => 'Surat Pengajuan'
        ]);
        return redirect('/dashboard')->with('success', 'Form sudah diisi!');
     }


     public function inputmagang(){
        $post['perusahaan'] = Perusahaan::all();
        return view('/Institusi/kerjasama/form-magang-guru',$post);
     }
     public function simpanmagang(Request $request)
     {
         $validatedData = $request->validate([
             'institusi_id' => 'required',
             'perusahaan_id' => 'required',
             'daftar_mou_id' => 'required',
             'tanggal_awal' => 'required',
             'tanggal_akhir' => 'required'
         ]);
         $kerjasama = Kerjasama::create($validatedData);
         $dokumen = Dokumen::create([
             'nama_dokumen' => $request->file('dokumen1')->store('file'),
             'kerjasama_id' => $kerjasama->id,
             'keterangan' => 'Surat Pengajuan'
         ]);
         $validatedData['kerjasama_id'] = $kerjasama->id;
         $validatedData['dokumen_id'] = $dokumen->id;
 
         foreach($request->nama_peserta as $key => $nama){
             $peserta = Peserta::create([
                 'kerjasama_id' => $kerjasama->id,
                 'nama_peserta' => $request->nama_peserta[$key],
                 'nomor_induk' => $request->nomor_induk[$key],
                 'jenis_kelamin' => $request->jenis_kelamin[$key],
                 'no_hp' => $request->no_hp[$key],
                 'status' => $request->status[$key],
                 'dokumen_id' => $dokumen->id,
             ]);
         }
         return redirect('/dashboard')->with('success', 'Form sudah diisi!');
     }
 


     public function inputsuvervisi(){
        $post['perusahaan'] = Perusahaan::all();
        return view('/Institusi/kerjasama/form-suvervisi',$post);
     }
     public function simpansuvervisi(Request $request){
        $validatedData = $request->validate([
            'institusi_id' => 'required',
            'perusahaan_id' => 'required',
            'daftar_mou_id' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required'
        ]);
        $kerjasama = Kerjasama::create($validatedData);
        $validatedData['kerjasama_id'] = $kerjasama->id;
        if ($request->hasFile('dokumen1')) {
            $dokumen = Dokumen::create([
                'nama_dokumen' => $request->file('dokumen1')->store('file'),
                'kerjasama_id' => $kerjasama->id,
                'keterangan' => 'Surat Pengajuan'
            ]);
        }
        if($request->hasFile('dokumen2')) {
            $dokumen = Dokumen::create([
                'nama_dokumen' => $request->file('dokumen2')->store('file'),
                'kerjasama_id' => $kerjasama->id,
                'keterangan' => 'RAB'
            ]);
        }
        return redirect('/dashboard')->with('success', 'Form sudah diisi!');
     }
}
