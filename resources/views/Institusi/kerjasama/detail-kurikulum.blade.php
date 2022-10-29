@extends('institusi')
@section('container')
    <div class="section-header">
        <h1>Detail Pengajuan Kurikulum</h1>
    </div>
    <div class="section-body">
        @if($errors->any())
            {!! implode('',$errors->all('<div>:message</div>')) !!}
        @endif
        <form action="/input-kurikulum/simpan" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Institusi</label>
                                <input type="text" class="form-control" name="nama_institusi" value="{{ auth('institusi')->user()->institusi['nama_institusi'] }}" readonly>

                            </div>
                            <div class="form-group">
                                <label>Nama Perusahaan</label><br>
                                <input type="text" class="form-control" name="nama_perusahaan" value="{{$data->kerjasama->perusahaan->nama_perusahaan}}" readonly>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tanggal Awal Kerjasama</label>
                                        <input type="date" class="form-control" name="tanggal_awal" value="{{$data->kerjasama->tanggal_awal}}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tanggal Akhir Kerjasama</label>
                                        <input type="date" class="form-control" name="tanggal_akhir" value="{{$data->kerjasama->tanggal_akhir}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($data->kerjasama->dokumen as $dokumen)
                            <div class="col-lg-4">
                                        <div class="form-group">
                                                    <a href="{{ asset('/storage/' .$dokumen->nama_dokumen) }}" class="btn btn-primary d-block w-75 loat-end mx-2 mt-3">{{ $dokumen->keterangan }}</a>
                                                </div>
                                            </div>
                                            @endforeach
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
