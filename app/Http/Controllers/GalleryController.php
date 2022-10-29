<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    //
    public function index(Request $request){
        $data['gallery'] = Gallery::all();
        return view('/Admin/galeri/tabel-galeri')->with($data)->with('i',($request->input('page',1)-1));
    }

    public function input(){
        return view('Admin/galeri/input-galeri');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'gambar' => ['required', 'image', 'mimes:jpg,png,jpeg,gif', 'max:10000'],
        ]);
        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('image');
        }
        Gallery::UpdateOrCreate($validatedData);
        return redirect('/admin/tabel-galeri')->with('toast-succsess','Tabel sudah diisi');
    }
    public function hapus($id)
    {
        Gallery::where('id', '=', $id)->delete();
        return back()->with('sucsess', 'data berhasil dihapus!');
    }
}
