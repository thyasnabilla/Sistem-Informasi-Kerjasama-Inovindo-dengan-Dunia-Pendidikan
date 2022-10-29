@extends('admin')
@section('container')
    <div class="section-header">
        <h1>Input Testimoni</h1>
    </div>
    <div class="section-body">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="/admin/input-testimoni/simpan" method="post">
                                @csrf
                                <div class="form-group row mb-4 mx-3">
                                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Institusi</label>
                                      <select class="form-control select2 w-50" name="institusi_id">
                                        @foreach ($institusi as $row)
                                        <option value="{{ $row['id'] }}">{{ $row['nama_institusi']}}</option>
                                        @endforeach 
                                      </select>
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
