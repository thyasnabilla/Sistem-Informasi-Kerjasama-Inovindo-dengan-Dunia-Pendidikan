@extends('institusi')
@section('container')
    <div class="section-header">
        <h1>Formulir Pengajuan Prakerin</h1>
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
                                        <label>Tanggal Awal Prakerin</label>
                                        <input type="date" class="form-control" name="tanggal_awal" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tanggal Akhir Prakerin</label>
                                        <input type="date" class="form-control" name="tanggal_akhir" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="upload">Upload Surat Pengjuan Prakerin</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                                name="dokumen1" required>
                                        </div>
                                </div>
                            <button class="btn btn-success add-more" type="button">
                                <i class="glyphicon glyphicon-plus"></i>Tambah Peserta
                            </button>
                            
                            <div class="tambah">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label>Nama Peserta:</label>
                                            <input type="text" class="form-control" name="nama_peserta[]" >
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label>Status:</label>
                                            <select name="status[]" id="" class="form-control">
                                                <option value="Siswa">Siswa</option>
                                                <option value="Mahasiswa">Mahasiswa</option>
                                                <option value="Guru">Guru</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>NISN/NPM/NUPTK:</label>
                                            <input type="text" class="form-control" name="nomor_induk[]" >
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label>Nomor Handphone:</label>
                                            <input type="text" class="form-control" name="no_hp[]" >
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label>Jenis Kelamin:</label>
                                            <select name="jenis_kelamin[]" id="" class="form-control">
                                                <option value="Perempuan">Perempuan</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <button class="btn btn-danger remove mt-4" type="button"><i class="glyphicon glyphicon-remove"></i>
                                            Hapus</button>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="wadah">

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
