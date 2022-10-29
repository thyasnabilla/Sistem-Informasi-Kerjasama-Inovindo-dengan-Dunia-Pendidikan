<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Gallery;
use App\Models\Jenis;
use App\Models\Testimoni;
use App\Models\Institusi;
use App\Models\Kerjasama;
use App\Models\LandingPage;
use App\Models\Pertanyaan;
use App\Models\Peserta;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
        $post['berita']
            = Berita::latest()->limit(3)->get();

        $post['testimoni']  = Testimoni::whereHas('institusi')->get();
        $post['gallery'] = Gallery::limit(9)->get();
        $post['jenis'] = Jenis::all();
        $post['landingpage'] = LandingPage::first();
        $post['pertanyaan'] = Pertanyaan::limit(6)->get();
        $post['institusi'] = Institusi::all();
        $post['countInstitusi'] = Institusi::count();
        $post['countKerjasama'] = Kerjasama::count();
        $post['countPeserta'] = Peserta::count();
        return view('index')->with($post);
    }

}
