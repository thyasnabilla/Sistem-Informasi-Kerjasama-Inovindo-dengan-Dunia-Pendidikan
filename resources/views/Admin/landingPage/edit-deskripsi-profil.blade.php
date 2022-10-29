@extends('admin')
@section('container')
    <div class="section-header">
        <h1>Input Deskripsi Profil </h1>
    </div>
    <div class="section-body">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="/admin/update-deskripsi/{{$id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi Profil Perusahaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="deskripsi_profil" id="summernote" class="summernote">{{$deskripsi_profil}}</textarea>
                                    </div>
                                </div>
                            
                                <div class="form-group row mb-2">
                               
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Unggah
                                        Gambar</label>
                                   
                                        @if ($gambar)
                                        <img src="{{ asset('/storage/' . $gambar) }}" alt=""
                                            class="img-preview img-fluid d-block col-lg-4" width="300px">
                                @else
                                @endif
                                    <div class="col-sm-12 col-md-7 col-lg-3 offset-3 mt-3">
                                        <input type="file" name="gambar" class="form-control-file"
                                            value="{{ $gambar }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi Tentang Kami</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="deskripsi_tentang_kami" id="summernote" class="summernote">{{ $deskripsi_tentang_kami }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Video Tentang Kami</label>
                                    <div class="embed-responsive embed-responsive-21by9 col-sm-12 col-md-7 w-50">
                                    <iframe width="853" height="480" src="{{$video}}" title="PRODUK & LAYANAN PT. INOVINDO DIGITAL MEDIA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                               
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Input Link Video</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="video" class="form-control"
                                            value="{{ $video }}">
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
