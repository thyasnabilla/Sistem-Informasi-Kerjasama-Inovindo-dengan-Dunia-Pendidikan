 <style>
    .halut:hover{
        transform: scale(1.05);
        box-shadow: 0 20px 35px 0 rgba(0,0,0,0.08);
    }
   </style>
   @extends('institusi')
    @section('container')
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper mt-4"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jumlah Perohonan MoU</h4>
                        </div>
                        <div class="card-body">
                            {{ $mou }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file mt-4"></i>
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
        </div><br>
        <div class="section-body">
            <div class="row">
                @foreach ($jenis as $item)
                    <div class="halut col-lg-4 my-3" style=" max-height:370px;">
                        <div class="card shadow p-3" style="width: 340px;">
                            <img src="{{ asset('/storage/'.$item->gambar) }}" class="card-img-top w-75 mx-auto mt-3" alt="...">
                            <div class="card-body">
                                <h6 class="card-title text-center" style="height:57px;">{{ $item->jenis }}</h6><br>
                                <a href="/detailpermohonan/{{ $item['id'] }}" class="btn btn-primary d-block w-75 float-end mx-auto ">Lihat Detail</a><br>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
