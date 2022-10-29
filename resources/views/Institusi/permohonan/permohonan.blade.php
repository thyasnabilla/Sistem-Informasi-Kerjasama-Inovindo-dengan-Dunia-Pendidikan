
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
                  <form action="/permohonan/send" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="card-body">
                        @if($errors->any())
                          {!! implode('',$errors->all('<div>:message</div>')) !!}
                        @endif
                          <div class="form-group">
                            <label>Nama Institusi</label>
                            <input type="text" class="form-control" name="nama_institusi" value="{{ auth('institusi')->user()->institusi['nama_institusi'] ??'' }}" readonly>
                            <input type="hidden" class="form-control" name="institusi_id" value="{{ auth('institusi')->user()->institusi['id'] ??''}}">
                            <input type="hidden" class="form-control" name="institusi_pimpinan_id" value="{{ auth('institusi')->user()->institusi_pimpinan['id'] ??''}}">
                          </div>
                          <div class="form-group">
                            <label>Nama Pimpinan</label>
                            <input type="text" class="form-control" name="nama_pimpinan" value="{{ $nama_pimpinan }}" readonly>
                          </div>
                          <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <select name="perusahaan_id" id="" class="form-control" readonly>
                                    @foreach ($perusahaan as $item)
                                        <option value="{{ $item->id }}" selected>{{ $item->nama_perusahaan }}</option>
                                    @endforeach
                                </select>
                            </div>
                          <div class="form-group">
                            <label>Nomor Surat MoU</label>
                            <input type="text" class="form-control" name="nomor_surat" value="{{ old('nomor_surat') }}" required>
                          </div>
                          <div class="form-group">
                            <label class="d-block">Jenis Permohonan</label>
                            <div class="form-check">
                              <ul>
                                @foreach ($jenis as $row)
                                <li>
                                    <input class="form-check-input" type="checkbox" id="defaultCheck1" name="daftar[]" value="{{ $row['id'] }}" {{ in_array($row['id'], old('daftar', [])) ? 'checked' : ' ' }}>
                        

                                    <label class="form-check-label" for="defaultCheck1">
                                    {{ $row['jenis']}}
                                    </label>
                                  </li>
                                  @endforeach
                              </ul>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Tanggal Mulai Kerjasama</label>
                            <input type="date" class="form-control" name="tanggal_mulai" required>
                          </div>
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label>MoU</label>
                                <input type="file" class="form-control-file" name="dokumen" required>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group" id="file">
                                <label>Contoh MoU</label><br>
                                <a href="/assets/teks brief pagi.rar"><input type="button" class="btn btn-primary mr-1" value="Download"></a>
                              </div>
                            </div>
                            </div>
                          </div>
                          @if( auth('institusi')->user()->institusi == null )
                           <center>Anda Harus Mengajukan Melengkapi Profil Terlebih Dahulu <a href="/inputprofil">Input Profil</a></center><br><br>
                          @else
                          <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit" name="send">Kirim</button>
                          </div>
                          @endif
                        </div>
                  </div>
                  </form>
                </div>
              </div> 
            </div> 
          </div> 
    
    @endsection