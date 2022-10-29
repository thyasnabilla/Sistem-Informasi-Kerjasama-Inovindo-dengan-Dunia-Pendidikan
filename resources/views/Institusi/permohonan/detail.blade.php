
@extends('institusi')
@section('container')
          <div class="section-header">
            <h1>Detail Permohonan MoU</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12 col-md-6 col-lg-8">
                <div class="card">

                 
                  <form action="/permohonan/send" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="card-body">
                        @if($errors->any())
                          {!! implode('',$errors->all('<div>:message</div>')) !!}
                        @endif
                          <div class="form-group">
                            <label>Nama Institusi</label>
                            <input type="text" class="form-control" name="nama_institusi" value="{{$data->institusi->nama_institusi }}" readonly>
                          </div>
                          <div class="form-group">
                            <label>Nama Pimpinan</label>
                            <input type="text" class="form-control" name="nama_pimpinan" value="{{$data->institusi->nama_pimpinan }}" readonly>
                          </div>
                          <div class="form-group">
                                <label>Nama Perusahaan</label><br>
                            <input type="text" class="form-control" name="nama_perusahaan" value="{{$data->perusahaan->nama_perusahaan}}" readonly>
                            </div>
                          <div class="form-group">
                            <label>Nomor Surat MoU</label>
                            <input type="text" class="form-control" name="nomor_surat" value="{{$data->nomor_surat}}" readonly>
                          </div>
                          <div class="form-group">
                            <label class="d-block">Jenis Permohonan</label>
                            <div class="form-check">
                              <ul>
                                @foreach($data->daftar_mou as $row)
                                <li>
                                    <label class="form-check-label" for="defaultCheck1">
                                    {{ $row->jenis['jenis']}} 
                                    </label>
                                  </li>
                                  @endforeach
                              </ul>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Tanggal Mulai Kerjasama</label>
                            <input type="date" class="form-control" name="tanggal_mulai" value="{{$data->tanggal_mulai}}" readonly> 
                          </div>
                          <div class="col-lg-4">
                                        <div class="form-group">
                                        <a href="{{ asset('/storage/' .$data->dokumen->nama_dokumen) }}" class="btn btn-primary d-block w-100 loat-end mx-2 mt-3"> Download &nbsp;{{ $data->dokumen->keterangan}}</a><br>
                                    
                                    </div>
                                </div>

                        </div>
                  </div>
                  </form>
                </div>
              </div> 
            </div> 
          </div> 
    
    @endsection