@extends('admin')
@section('container')
    <div class="section-header">
        <h1>Input Berita</h1>
    </div>
    <div class="section-body">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        
                        <div class="card-body">
                            <form action="/admin/input-berita/simpan" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penulis</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="admin_id" class="form-control"
                                            value="{{ auth('admin')->user()->nama_admin }}" readonly>
                                        <input type="hidden" name="admin_id" class="form-control"
                                            value="{{ auth('admin')->user()->id }}" >
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="judul" class="form-control"
                                            value="{{ old('judul') }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Unggah
                                        Gambar</label>
                                    <div class="col-sm-12 col-md-7">
                                        <img class="img-preview img-fluid" alt="">
                                        <input name="gambar" type="file" id="gambar"
                                            class="form-control-file  @error('gambar') is-invalid @enderror"
                                            onchange="previewImage()">
                                        @error('gambar')
                                            <div class="invalid-feedback" role="alert">
                                                <span>
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="isi" id="summernote" class="summernote">{{ old('isi') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" name="simpan" class="btn btn-primary">Upload</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
