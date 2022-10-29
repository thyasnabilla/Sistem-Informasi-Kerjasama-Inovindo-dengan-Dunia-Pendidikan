@extends('institusi')
@section('container')
    <div class="section-header">
        <h1>Detail Pengajuan Prakerin</h1>
    </div>
    <div class="section-body">
        @if($errors->any())
            {!! implode('',$errors->all('<div>:message</div>')) !!}
        @endif
        <form action="/input-kerjasama/simpan" method="post" enctype="multipart/form-data">
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
                                        <label>Tanggal Awal Prakerin</label>
                                        <input type="date" class="form-control" name="tanggal_awal" value="{{$data->kerjasama->tanggal_awal}}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tanggal Akhir Prakerin</label>
                                        <input type="date" class="form-control" name="tanggal_akhir" value="{{$data->kerjasama->tanggal_akhir}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                        <div class="form-group">
                                            @foreach($data->kerjasama->dokumen as $dokumen)
                                                 
                                                    <a href="{{ asset('/storage/' .$dokumen->nama_dokumen) }}" class="btn btn-primary d-block w-75 loat-end mx-2 mt-3"> Download{{ $dokumen->keterangan }}</a><br>
                                                 
                                            @endforeach
                                    </div>
                                </div>
                         
                            
                            @foreach($data->kerjasama->peserta as $peserta)

                            <div class="tambah">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <label>Nama Peserta:</label>
                                            <input type="text" class="form-control" name="nama_peserta[]" value="{{$peserta->nama_peserta}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <label>Status:</label>
                                            <input type="text" class="form-control" name="status[]" value="{{$peserta->status}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <label>NISN/NPM/NUPTK:</label>
                                            <input type="text" class="form-control" name="nomor_induk[]" value="{{$peserta->nomor_induk}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <label>Nomor Handphone:</label>
                                            <input type="text" class="form-control" name="no_hp[]" value="{{$peserta->no_hp}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <label>Jenis Kelamin:</label>
                                            <input type="text" class="form-control" name="jenis_kelamin[]" value="{{$peserta->jenis_kelamin}}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="wadah">

                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
