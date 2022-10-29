<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertanyaan;


class PertanyaanController extends Controller
{
    
    public function index(Request $request)
    {
        $tabel['pertanyaan']  = Pertanyaan::all();
        return view('/Admin/landingPage/tabel-pertanyaan')->with($tabel)->with('i',($request->input('page',1)-1));
    }
    public function tambah()
    {
        return view('/Admin/landingPage/input-pertanyaan');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pertanyaan' => 'required',
            'jawaban' => 'required'
        ]);
        Pertanyaan::create($validatedData);
        return redirect('/admin/tabel-pertanyaan')->with('sucsess', 'Berita berhasil diupload!');
    }
    public function hapus($id)
    {
        Pertanyaan::where('id', '=', $id)->delete();
        return back()->with('sucsess', 'data berhasil dihapus!');
    }
    public function edit($id)
    {
        $row = Pertanyaan::find($id);
        $data = [
           
            'pertanyaan' => $row->pertanyaan,
            'jawaban' => $row->jawaban,
            'id' => $row->id
        ];
        return view('/Admin/landingPage/edit-pertanyaan', $data);
    }

    public function update($id, Request $request)
    {
        $data = [
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban,
        ];
       
        Pertanyaan::where('id', $id)->update($data);
        return redirect('/admin/tabel-pertanyaan');
    }
}
