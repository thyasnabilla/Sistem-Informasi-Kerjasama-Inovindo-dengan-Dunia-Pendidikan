@extends('LayoutWeb.navbar-index')
@section('content')
    <section id="detail-berita">
        <div class="container shadow-sm  mb-5 bg-white rounded">
            <div class="judul">
                <h1 class="fw-bolder">
                    {{ $detail['judul'] }}
                </h1>
            </div>
            <hr>
            <div class="penulis">
                <h6 class="text-secondary" style="font-size:16px ">oleh {{ $berita->nama_admin }} |
                    {{ $detail['created_at'] }}</h6>
            </div>

            <div class="gambar img-fluid" style="max-height: 400px;overflow: hidden;max-width:800px ;">
                <img src="{{ asset('/storage/' . $detail['gambar']) }}" alt="" class="img-fluid">
            </div>
            <div class="isi mt-5">
                <p>
                    {!! $detail['isi'] !!}
                </p>
            </div>
        </div>
    </section>
@endsection