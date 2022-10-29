
@extends('institusi')
@section('container')
          <div class="section-header">
            <h1>Form Permohonan MoU</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12 col-md-6 col-lg-8">
                <div class="card">

                  <div class="card-header">
                    <h4>Isi Data di Bawah Ini</h4>
                  </div>

                    

                    <div class="card-body">
                                    <form method="POST"  action="/input-pimpinan/store">
                                    @csrf
                                      <div class="row">
                                      <div class="form-group">
                                                <label>Nama Institusi</label>
                                                <input type="text" class="form-control" name="nama_institusi" value="{{ auth('institusi')->user()->institusi['nama_institusi'] }}" readonly>
                                                <input type="hidden" class="form-control" name="institusi_id" value="{{ auth('institusi')->user()->institusi['id'] }}">
                                              </div>
                                        <div class="form-group col-6">
                                          <label for="last_name">Nama Pimpinan</label>
                                          <input id="last_name" type="text" class="form-control" name="nama_pimpinan" value="{{ old('nama_pimpinan') }}">
                                        </div>
                                      </div>
                                      <div class="card-footer text-right">
                                        <button class="btn btn-primary" name="simpan">Simpan</button>
                                      </div>
                                    </form>
                                  </div>
                  </form>
                </div>
              </div> 
            </div> 
          </div> 
    
    @endsection
