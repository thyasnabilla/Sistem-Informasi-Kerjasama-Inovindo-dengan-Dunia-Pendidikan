<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingPage;


class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        $tabel['landingpage']  = LandingPage::all();
        return view('/Admin/landingPage/tabel-deskripsi')->with($tabel)->with('i',($request->input('page',1)-1));
    }
    public function tambah()
    {
        return view('/Admin/landingPage/input-deskripsi-profil');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi_profil' => 'required',
            'gambar' => ['required', 'image', 'mimes:jpg,png,jpeg,gif', 'max:10000'],
            'deskripsi_tentang_kami' => 'required',
            'video' => 'required'
        ]);
        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('image');
        }


        LandingPage::create($validatedData);
        return redirect('/admin/deskripsi-profil')->with('sucsess', 'Berita berhasil diupload!');
    }

    
    public function edit($id)
    {
        $row = LandingPage::find($id);
        $data = [
            'deskripsi_profil' => $row->deskripsi_profil,
            'gambar' => $row->gambar,
            'deskripsi_tentang_kami' => $row->deskripsi_tentang_kami,
            'video' => $row->video,
            'id' => $row->id
        ];
        return view('/Admin/landingPage/edit-deskripsi-profil', $data);
    }

    public function update($id, Request $request)
    {
        $data = [
            'deskripsi_profil' => $request->deskripsi_profil,
            'deskripsi_tentang_kami' => $request->deskripsi_tentang_kami,
            'video' => $request->video,
        ];
        $file   = $request->file("gambar");
    if ($request->hasfile("gambar")) {
        $gambar = $file->storeAs("image", $file->hashName());
        $data['gambar'] = $gambar;
    }
        LandingPage::where('id', $id)->update($data);
        return redirect('/admin/edit-deskripsi-profil/' . $id);
    }
}
