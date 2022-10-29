<?php

namespace App\Http\Controllers;

use App\Models\Mou;
use App\Models\Jenis;
use App\Models\Institusi;
use App\Models\Perusahaan;
use App\Models\Kerjasama;
use PDF;
use Illuminate\Http\Request;

class PermohonanAdminController extends Controller
{
    //
    public function permohonan(Request $request){
        $data['mou'] = Mou::whereHas('institusi')->latest()->get();
        return view('/Admin/permohonan/daftar-permohonan')->with($data)->with('i',($request->input('page',1)-1));
    } 
    
    public function download($id){
        $mou = Mou::with(['institusi','institusi.institusi_pimpinan','perusahaan'])->find($id);
        $pdf = PDF::loadview('/Admin/permohonan/mou-pdf',compact('mou'));
        $pdf->setPaper('A4','potrait');
        return $pdf->stream('download-mou.pdf');

    }

    public function tabel(Request $request){
        $data['jenis'] = Jenis::all();
        return view('/Admin/jenis/tabel-jenis')->with($data)->with('i',($request->input('page',1)-1));
    }
    
    
    public function input(){
        return view('/Admin/jenis/input-detail');
    } 

    public function simpan(Request $request){
        $validatedData = $request->validate([
            'jenis' => 'required',
            'gambar' => ['required', 'mimes:jpg,png,jpeg,gif', 'max:10000'],
            'isi' => 'required'
        ]);
        $validatedData['gambar'] = $request->file('gambar')->store('image');
        Jenis::create($validatedData);
        return redirect('/dashboard-admin')->with('toast-succsess','Data sudah diisi');
    
    }
    public function hapus($id)
    {
        Jenis::where('id', '=', $id)->delete();
        return back()->with('sucsess', 'data berhasil dihapus!');
    }
    public function edit($id, Request $request)
    {
        $row = Jenis::find($id);
        $data = [
            'id' => $row->id,
            'jenis' => $row->jenis,
            'gambar' => $row->gambar,
            'isi' => $row->isi
        ];
        return view('/Admin/jenis/edit-jenis', $data);
    }
    public function update($id, Request $request)
    {
        // $data = [
        //     'jenis' => $request->jenis,
        //     'gambar' => $request->gambar,
        //     'isi' => $request->isi,
        // ];
        $validatedData = $request->validate([
            'jenis' => 'required',
            // 'gambar' => ['required', 'mimes:jpg,png,jpeg,gif', 'max:10000'],
            'isi' => 'required'
        ]);
        if ($request->hasFile('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('image');
            // $data['gambar'] = $request->file('gambar')->store('image');
        }
        Jenis::where('id', $id)->update($validatedData);
        // dd($validatedData);
        return redirect('/admin/tabel-jenis');
    }


    public function detail(Request $request, $id)
    {
        $data = Mou::with(['dokumen','daftar_mou','daftar_mou.jenis'])
        ->find($id);
        return view('/Admin/permohonan/detail-mou', compact('data'));
    }
    public function diterima($id){
        $status = mou::select('status')->where('id',$id)->first();
        $update = $status->status;
        if($update == 0){
            mou::where('id',$id)->update([ 'status' => 1 ]);
        }
        return redirect('/admin/permohonan-admin');
    }
    public function ditolak($id){
        $status = mou::select('status')->where('id',$id)->first();
        $update = $status->status;
        if($update == 0){
            mou::where('id',$id)->update([ 'status' => 2 ]);
        }
        return redirect('/admin/permohonan-admin');
    }

    public function hapustabel($id)
    {
        Mou::where('id', '=', $id)->delete();
        return back()->with('sucsess', 'data berhasil dihapus!');
    }
    
    public function riwayatpermohonan(){
        return view('/Admin/permohonan/riwayat-permohonan');
    }
}
