
    @extends('admin')
    @section('container')
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Institusi</h4>
                  </div>
                  <div class="card-body">
                    {{ $institusi }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Permohonan MoU</h4>
                  </div>
                  <div class="card-body">
                    {{ $mou }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Kerjasama</h4>
                  </div>
                  <div class="card-body">
                   {{ $kerjasama }}
                  </div>
                </div>
              </div>
            </div>                 
          </div>
          <div class="card w-75">
        <div class="dropdown-header"> <b>Pemberitahuan</b>
        </div>
        <div class="dropdown-list-content dropdown-list-icons">
            @foreach ($notifikasi as $item)
                @if ($item->status == 2)
                    <div class="alert alert-light m-3" role="alert">
                        <b>{{ $item->text }} </b>
                        <div class="float-right">
                            <div class="text-dark">{{ $item->tanggal }}</div>
                        </div>
                    </div>
                @endif
                @if ($item->status == 1)
                    <div class="alert  m-3 text-dark" role="alert" style="background-color: #d1cfe2;">
                         <b>{{ $item->text }}</b>
                        <div class="float-right">
                            <div class="text-dark">{{ $item->tanggal }}</div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
     
    </div>
@endsection