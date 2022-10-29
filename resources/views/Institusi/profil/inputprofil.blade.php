@extends('institusi')
@section('container')
          <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Silahkan Lengkapi Profil Anda</h2>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                  </div>
                </div>
              </div>
              <div class="col-20 col-md-6 col-lg-7">
                <div class="card">
                      <form method="post" action="/input/store"class="needs-validation" novalidate="" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                        <h4>Input Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                    <label>Nama Institusi</label>
                                    <input type="text" class="form-control" name="nama_institusi" value="{{ old('nama_institusi') }}">
                                    </div>
                                    <div class="form-group">
                                    <label>Nama Pimpinan</label>
                                    <input type="text" class="form-control" name="nama_pimpinan"value="{{ old('nama_pimpinan') }}">
                                    </div>
                                    <div class="form-group">
                                      <label>Provinsi</label>
                                      <select onchange="changeProvince(event)" class="form-control select2" name="province_id">
                                        @foreach ($province as $row)
                                        <option value="{{ $row['id'] }}">{{ $row['name']}}</option>
                                        @endforeach 
                                      </select>
                                    </div>                   
                                    <div class="form-group">
                                      <label>Kota</label>
                                      <select onchange="changeRegency(event)" class="form-control select2" name="regencie_id" id="regency">
                                        
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label>Kecamatan</label>
                                      <select onchange="changeDistrict(event)" class="form-control select2" name="district_id" id="district">
                                        
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label>Desa</label>
                                      <select onchange="changeVillage(event)" class="form-control select2" name="village_id" id="village">
                                       
                                      </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                            </div>
                                            <input type="text" class="form-control phone-number" name="telepon" value="{{ old('telepon') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Logo</label>
                                        <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="logo">
                                        @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                    <label>Website</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-laptop"></i>
                                        </div>
                                        </div>
                                        <input type="text" class="form-control currency" name="website" value="{{ old('website') }}">
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                        </div>
                                        <input type="text" class="form-control pwstrength" data-indicator="pwindicator" name="email"value="{{ auth('institusi')->user()->email }}" readonly>
                                        <input type="hidden" class="form-control" name="user_id" value="{{ auth('institusi')->user()->user['id']??'' }}">
                                    </div>
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label>Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                        </div>
                                        <input type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password"value="{{ auth('institusi')->user()->password }}">
                                        <input type="hidden" class="form-control" name="user_id" value="{{ auth('institusi')->user()->user['id']??'' }}">
                                    </div>
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                    </div>
                                    <div class="card-footer text-right">
                                    <button class="btn btn-primary" name="simpan">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </form>
                </div>
              </div>
            </div>
          </div>

          <script>
            function changeProvince(event){
              id = event.target.value;
              $.ajax({
                "url": "{{ url('api/regencies') }}/"+id,
                "success" : function(result){
                  let pilihan = "";
                  result.forEach(function(item){
                    pilihan += `<option value="${item.id}">${item.name}</option>`;
                  });
                  $('#regency').html(pilihan);
                } 
              });
            }

            function changeRegency(event){
              id = event.target.value;
              $.ajax({
                "url": "{{ url('api/districts') }}/"+id,
                "success" : function(result){
                  let pilihan = "";
                  result.forEach(function(item){
                    pilihan += `<option value="${item.id}">${item.name}</option>`;
                  });
                  $('#district').html(pilihan);
                } 
              });
            }
            function changeDistrict(event){
              id = event.target.value;
              $.ajax({
                "url": "{{ url('api/villages') }}/"+id,
                "success" : function(result){
                  let pilihan = "";
                  result.forEach(function(item){
                    pilihan += `<option value="${item.id}">${item.name}</option>`;
                  });
                  $('#village').html(pilihan);
                } 
              });
            }
           
          </script>
  @endsection
