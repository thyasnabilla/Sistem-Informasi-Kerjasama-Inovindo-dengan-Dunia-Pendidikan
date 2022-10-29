<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use App\Models\Institusi;

class TestimoniController extends Controller
{
    //
    public function tabeltestimoni(Request $request)
    {
        $data['testimoni'] = Testimoni::whereHas('institusi')->latest()->get();
        
        return view('/Admin/testimoni/tabel-testimoni')->with($data)->with('i',($request->input('page',1)-1));
    }

    public function inputtestimoni(){
        $data['institusi'] = Institusi::all();
        return view('/Admin/testimoni/input-testimoni')->with($data);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'institusi_id' => 'required',
            'isi' => 'required'
        ]);
        Testimoni::create($validatedData);
        return redirect('/admin/tabel-testimoni')->with('toast-succsess','Data sudah diisi');
    }
    public function hapus($id)
    {
        Testimoni::where('id', '=', $id)->delete();
        return back()->with('sucsess', 'data berhasil dihapus!');
    }
    public function edit($id)
    {
        $row = Testimoni::find($id);
        $data = [
            'institusi_id' => $row->institusi,
            'isi' => $row->isi,
            'id' => $row->id
        ];
        $data['institusi'] = Institusi::all();
        return view('/Admin/testimoni/edit-testimoni', $data);
    }
    public function update($id, Request $request)
    {
        $data = [
            'institusi_id' => $request->institusi_id,
            'isi' => $request->isi,
        ];
        Testimoni::where('id', $id)->update($data);
        return redirect('/admin/tabel-testimoni');
    }


}
