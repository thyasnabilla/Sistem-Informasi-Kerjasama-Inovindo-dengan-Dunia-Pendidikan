@extends('admin')
@section('container')
    <div class="section-header">
        <h1>Edit Jenis Kerjasama</h1>
    </div>
    <div class="section-body">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        
                        <div class="card-body">
                            <form action="/admin/jenis/update/{{$id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Permohonan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="jenis" class="form-control"
                                        value="{{ $jenis }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Unggah
                                        Gambar</label><br>
                                    @if ($gambar)
                                        <img src="{{ asset('/storage/' . $gambar) }}" alt=""
                                            class="img-preview img-fluid d-block col-lg-4" width="300px">
                                </div>
                                    @else
                                     @endif
                                <div class="row">
                                    <div class="col-sm-12 col-md-7 col-lg-3 offset-3">
                                        <input type="file" name="gambar" class="form-control-file"
                                            value="{{ $gambar }}">
                                    </div>

                                </div><br>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="isi" id="summernote" class="summernote">{{ $isi }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
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
