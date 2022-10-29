@extends('institusi')
@section('container')
    <div class="section-header">
        <h1>Formulir Pengajuan Teaching Factory</h1>
    </div>
    <div class="section-body">
        @if($errors->any())
            {!! implode('',$errors->all('<div>:message</div>')) !!}
        @endif
        <form action="/input-teaching/simpan" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Institusi</label>
                                <input type="text" class="form-control" name="nama_institusi" value="{{ auth('institusi')->user()->institusi['nama_institusi'] }}" readonly>
                                <input type="hidden" class="form-control" name="institusi_id" value="{{ auth('institusi')->user()->institusi['id'] }}">
                                <input type="hidden" class="form-control" name="jenis_id" value="{{ request()->jenis_id }}">
                                <input type="hidden" class="form-control" name="daftar_mou_id" value="{{ request()->daftar_mou_id }}">

                            </div>
                            <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <select name="perusahaan_id" id="" class="form-control" readonly>
                                    @foreach ($perusahaan as $item)
                                        <option value="{{ $item->id }}" selected>{{ $item->nama_perusahaan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tanggal Pengajuan</label>
                                        <input type="date" class="form-control" name="tanggal_awal" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tanggal Pelaksanaan</label> 
                                        <input type="date" class="form-control" name="tanggal_akhir" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label for="upload">Upload Surat Pengajuan</label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="dokumen1" required>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label for="upload">Upload RAB</label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="dokumen2" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <button class="btn btn-primary" name="simpan">Simpan</button>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
