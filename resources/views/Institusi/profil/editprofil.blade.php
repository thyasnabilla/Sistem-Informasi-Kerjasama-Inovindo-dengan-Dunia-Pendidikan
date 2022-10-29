
    @extends('profil')
    @section('container')
  

          <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Selamat Datang!</h2>

          <form method="post" action="/input/update/{{$id}}"class="needs-validation" novalidate="" enctype="multipart/form-data">
            @csrf
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">                     
                    <img alt="image" src="{{ asset('/storage/'.$logo) }}" class="rounded-circle profile-widget-picture">
                  </div>
                      <div class="profile-widget-description">
                        <div class="profile-widget-name"> <div class="text-muted d-inline font-weight-normal"><div class="slash"></div>{{ $nama_institusi }}  </div>
                        <div class="card-header text-decoration-none border-none">
                            <button class="btn btn-primary"><a href="/input/pimpinan" class="text-light text-decoration-none"> + Tambah
                                    Pimpinan
                                </a></button>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-20 col-md-6 col-lg-7">
                <div class="card">
                        <div class="card-header">
                        <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                    <label>Nama Institusi</label>
                                    <input type="text" class="form-control" name="nama_institusi" value="{{ $nama_institusi }}">
                                    </div>
                                    <!-- <div class="form-group">
                                    <label>Nama Pimpinan</label>
                                    <input type="text" class="form-control" name="nama_pimpinan" value="{{ $nama_pimpinan }}">
                                    </div> -->
                                    <div class="form-group">
                                      <label>Provinsi</label>
                                      <select onchange="changeProvince(event)" class="form-control select2" name="province_id" id="province">
                                        @foreach ($province as $row)
                                        <option value="{{ $row['id'] }}" {{ $province_id == $row['id'] ? 'selected' : ''}}>{{ $row['name'] }}</option>
                                        @endforeach 
                                      </select>
                                    </div>                   
                                    <div class="form-group">
                                      <label>Kota</label>
                                      <select  onchange="changeRegency(event)" class="form-control select2" name="regencie_id" id="regency">
                                       
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label>Kecamatan</label>
                                      <select  onchange="changeDistrict(event)" class="form-control select2" name="district_id" id="district">
                                       
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label>Desa</label>
                                      <select  onchange="changeVillage(event)" class="form-control select2" name="village_id" id="village">
                                       
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
                                        <input type="text" class="form-control phone-number" name="telepon"value="{{ $telepon }}">
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
                                        <input type="text" class="form-control currency" name="website"value="{{ $website }}">
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
                                        <input type="text" class="form-control pwstrength" data-indicator="pwindicator" name="email"value="{{ $email }}">
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
                                        <input type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password"value="{{ $password }}">
                                    </div>
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                    </div>
                                    <div class="card-footer text-right">
                                    <button class="btn btn-primary" name="edit">Edit</button>
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
            var province_id = "{{ $province_id }}";
            var regencie_id = "{{ $regencie_id }}";
            var district_id = "{{ $district_id }}";
            var village_id = "{{ $village_id }}";

            setTimeout(() => {
              getRegency(province_id,regencie_id);
            getDistrict(regencie_id,district_id);
            getVillage(district_id,village_id);
            }, 1000);

            function getRegency(province_id,id = null){
              $.ajax({
                "url": "{{ url('api/regencies') }}/"+province_id,
                "success" : function(result){
                  let pilihan = "";
                  result.forEach(function(item){
                    let selected = id == item.id ? "selected" : "";
                    pilihan += `<option value="${item.id}" ${selected}>${item.name}</option>`;
                  });
                  $('#regency').html(pilihan);
                } 
              });
            }
            function getDistrict(regency_id, id = null){
              $.ajax({
                "url": "{{ url('api/districts') }}/"+regency_id,
                "success" : function(result){
                  let pilihan = "";
                  result.forEach(function(item){
                    let selected = id == item.id ? "selected" : "";
                    pilihan += `<option value="${item.id}" ${selected}>${item.name}</option>`;
                  });
                  $('#district').html(pilihan);
                } 
              });
            }
            function getVillage(district_id, id = null){
              $.ajax({
                "url": "{{ url('api/villages') }}/"+district_id,
                "success" : function(result){
                  let pilihan = "";
                  result.forEach(function(item){
                    let selected = id == item.id ? "selected" : "";
                    pilihan += `<option value="${item.id}" ${selected}>${item.name}</option>`;
                  });
                  $('#village').html(pilihan);
                } 
              });
            }
            function changeProvince(event){
              id = event.target.value;
             getRegency(id);
            }

            function changeRegency(event){
              id = event.target.value;
             getDistrict(id);
              
            }
            
            function changeDistrict(event){
              id = event.target.value;
             getVillage(id);
              
            }

           
            </script>
@endsection
