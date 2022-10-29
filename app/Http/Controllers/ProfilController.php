<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Institusi;
use App\Models\Notifikasi;
use App\Models\Province;
use App\Models\Institusi_pimpinan;
use App\Models\Regencie;
use App\Models\District;
use App\Models\User;
use App\Models\Village;


class ProfilController extends Controller
{
    //
    public function profil()
    {
        $data['province'] = Province::all();
        $data['regencie'] = Regencie::all();
        $data['district'] = District::all();
        $data['village'] = Village::all();
        return view('/Institusi/profil/inputprofil')->with($data);
    }

    public function store( Request $request)
    {
        $validatedData = $request->validate([
            'nama_institusi' => 'required',
            'nama_pimpinan' => 'required',
            'province_id' => 'required',
            'regencie_id' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
            'telepon' => 'required',
            'logo' => ['required', 'mimes:jpg,png,jpeg,gif', 'max:10000'],
            'website' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['logo'] = $request->file('logo')->store('image');
        $cre = auth()->user()->institusi()->create($validatedData);

        Notifikasi::create([
            'tanggal' => now(),
            'text' => 'Ada pendaftar baru dari ' . $cre->nama_institusi,
            'status' => AUTH_PENDAFTARAN
        ]);
        $pimpinan = Institusi_pimpinan::where('institusi_id', auth('institusi')->user()->institusi['id'])->count();
        if ($pimpinan > 0) {
            return redirect('/dashboard')->with('Succsess', 'Data sudah diisi');
        }
        return redirect()->intended('/input/pimpinan')->with('Succsess', 'Login Berhasil');
    }
    public function edit($id)
    {
        $row = Institusi::find($id);
        $data = [
            'id' => $row->id,
            'nama_institusi' => $row->nama_institusi,
            'nama_pimpinan' => $row->nama_pimpinan,
            'province_id' => $row->province_id,
            'regencie_id' => $row->regencie_id,
            'district_id' => $row->district_id,
            'village_id' => $row->village_id,
            'telepon' =>  $row->telepon,
            'logo' => $row->logo,
            'website' => $row->website,
            'email' => $row->email,
            'password' => $row->village_id,
            'province' => Province::all(),
            'regencie' => Regencie::all(),
            'district' => District::all(),
            'village' => Village::all(),
        ];
        return view('/Institusi/profil/editprofil', $data);
    }
    public function update($id, Request $request)
    {
        $data = [
            'nama_institusi' => $request->nama_institusi,
            'nama_pimpinan' => $request->nama_pimpinan,
            'province_id' => $request->province_id,
            'regencie_id' => $request->regencie_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'telepon' =>  $request->telepon,
            'website' => $request->website,
            'email' => $request->email,
            'password' => $request->password
        ];
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('image');
        }
        Institusi::where('id', $id)->update($data);
        return redirect('/input/edit/' . $id);
    }

    public function inputpimpinan(){
        return view('/Institusi/profil/tambah-pimpinan');
    }
    public function inputstore(Request $request)
    {
        
        $validatedData = $request->validate([
            'institusi_id' => 'required',
            'nama_pimpinan' => 'required'
        ]);
        Institusi_pimpinan::create($validatedData);
        return redirect('/dashboard');

    }
    public function pimpinan(Request $request){
        $pimpinan = Institusi_pimpinan::where('institusi_id', auth('institusi')->user()->institusi['id'])->latest()->get();

        return view('/Institusi/profil/pimpinan',compact('pimpinan'))->with('i',($request->input('page',1)-1));
    
    }
}   
