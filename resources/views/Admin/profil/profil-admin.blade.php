
    @extends('admin')
    @section('container')
            <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Selamat Datang!</h2>

          <form method="post" action="/admin/update/{{$id}}"class="needs-validation" novalidate="" enctype="multipart/form-data">
            @csrf
            <div class="row mt-sm-4">
              <div class="col-20 col-md-6 col-lg-7">
                <div class="card">
                        <div class="card-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Admin</label>
                                        <input type="text" class="form-control" name="nama_admin" value="{{ $nama_admin }}">
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
@endsection