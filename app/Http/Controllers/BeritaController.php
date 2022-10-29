<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class BeritaController extends Controller
{
    //

    public function tabel(Request $request)
    {
        $tabel['tabelberita']  = Berita::latest()->get();
        return view('/Admin/berita/tabel-berita')->with($tabel)->with('i',($request->input('page',1)-1));
    }
    public function input()
    {
        return view('/Admin/berita/input-berita');
    }
    public function simpan(Request $request)
    {
        $validatedData = $request->validate([
            'admin_id' => 'required',
            'judul' => 'required',
            'gambar' => ['required', 'image', 'mimes:jpg,png,jpeg,gif', 'max:10000'],
            'isi' => 'required'
        ]);
        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('img-berita');
        }


        Berita::create($validatedData);
        return redirect('/admin/tabel-berita')->with('sucsess', 'Berita berhasil diupload!');
    }
    public function hapus($id)
    {
        Berita::where('id', '=', $id)->delete();
        return back()->with('sucsess', 'data berhasil dihapus!');
    }
    public function detail($id)
    {
         Berita::find($id)
         ->increment('pengunjung');
        $row = Berita::find($id);
        $detail = [
            'admin_id' => $row->admin_id,
            'pengunjung' => $row->pengunjung,
            'judul' => $row->judul,
            'gambar' => $row->gambar,
            'isi' => $row->isi,
            'id' => $row->id,
            'created_at' => $row->created_at
        ];
        $berita = DB::table('beritas')
        ->join('admins','admins.id','=','beritas.admin_id')
        ->first();
        return view('/Admin/berita/detail-berita', compact('detail','berita'));
    }

    public function edit($id)
    {
        $row = Berita::find($id);
        $data = [
            'admin_id' => $row->admin_id,
            'judul' => $row->judul,
            'gambar' => $row->gambar,
            'isi' => $row->isi,
            'id' => $row->id
        ];
        return view('/Admin/berita/edit-berita', $data);
    }

    public function update($id, Request $request)
    {
        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
        ];
        $file   = $request->file("gambar");
        if ($request->hasfile("gambar")) {
            $gambar = $file->storeAs("image", $file->hashName());
            $data['gambar'] = $gambar;
        }
        Berita::where('id', $id)->update($data);
        return redirect('/admin/tabel-berita');
    }
}
