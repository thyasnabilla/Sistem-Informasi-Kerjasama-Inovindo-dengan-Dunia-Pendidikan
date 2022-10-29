@extends('admin')
@section('container')
    <div class="section-header">
        <h1>Input Pertanyaan </h1>
    </div>
    <div class="section-body">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                 
                        <div class="card-body">
                            <form action="/admin/input-pertanyaan/simpan" method="post" enctype="multipart/form-data">
                                @csrf
                                
                               
                               
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pertanyaan</label>
                                    <div class="col-sm-12 col-md-7">
                                    <textarea class="form-control" name="pertanyaan" rows="3">{{ old('pertanyaan') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jawaban</label>
                                    <div class="col-sm-12 col-md-7">
                                       
                                        <textarea class="form-control" name="jawaban" rows="3">{{ old('jawaban') }}</textarea>
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
