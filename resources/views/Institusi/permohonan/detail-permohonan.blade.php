@extends('institusi')
@section('container')
<div class="section-header">
        <h1>Detail Permohonan</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card" style="width: 1050px;">
                    <div class="card-body">&nbsp
                        <h4 class="card-title"><center> {{ $data['jenis'] }}</center></h4><br>
                        <div class="about-img" data-aos="fade-right" data-aos-delay="100">
                            <center><img src="{{ asset('/storage/'.$data['gambar']) }}" alt="" style="width: 250px;"></center>
                        </div>
                        <div class="isi mt-5 text-center w-50 m-auto ">
                            <p> {!! $data['isi'] !!} </p>
                        </div><br><br>
                     
                        @if( $data2 == null || $data2->status == 2 )
                           <center> <h6>Anda Harus Mengajukan Permohonan MoU Terlebih Dahulu</h6><a href="/permohonan" class="btn btn-primary">Ajukan Permohonan MoU</a></center>
                        @endif
                       
                        @if( $data['id'] == 1 && $data2 )
                            @if($data2->status == 1 && $data['id'] == $data2->jenis_id)
                                 <a href="/input-kerjasama/?jenis_id={{ $data['id'] }}&daftar_mou_id={{ $data2->daftar_mou_id }}" class="btn btn-primary d-block w-25 float-end mx-auto">Isi Form Kerjasama</a><br>
                            @endif
                        @endif

                        @if( $data['id'] == 2 && $data2 )
                            @if($data2->status == 1 && $data['id'] == $data2->jenis_id)
                                 <a href="/input-rekrut/?jenis_id={{ $data['id'] }}&daftar_mou_id={{ $data2->daftar_mou_id }}" class="btn btn-primary d-block w-25 float-end mx-auto">Isi Form Kerjasama</a><br>
                            @endif
                        @endif
                        
                        @if( $data['id'] == 3 && $data2 )
                            @if($data2->status == 1 && $data['id'] == $data2->jenis_id)
                                <a href="/input-kurikulum/?jenis_id={{ $data['id'] }}&daftar_mou_id={{ $data2->daftar_mou_id }}" class="btn btn-primary d-block w-25 float-end mx-auto">Isi Form Kerjasama</a><br>
                            @endif
                        @endif

                        @if( $data['id'] == 4 && $data2 )
                            @if($data2->status == 1 && $data['id'] == $data2->jenis_id)
                                 <a href="/input-guru-tamu/?jenis_id={{ $data['id'] }}&daftar_mou_id={{ $data2->daftar_mou_id }}" class="btn btn-primary d-block w-25 float-end mx-auto">Isi Form Kerjasama</a><br>
                            @endif
                        @endif

                        @if( $data['id'] == 5 && $data2 )
                            @if($data2->status == 1 && $data['id'] == $data2->jenis_id)
                                <a href="/input-magang/?jenis_id={{ $data['id'] }}&daftar_mou_id={{ $data2->daftar_mou_id }}" class="btn btn-primary d-block w-25 float-end mx-auto">Isi Form Kerjasama</a><br>
                            @endif
                        @endif

                        @if( $data['id'] == 6 && $data2 )
                            @if($data2->status == 1 && $data['id'] == $data2->jenis_id)
                                <a href="/input-ujikom/?jenis_id={{ $data['id'] }}&daftar_mou_id={{ $data2->daftar_mou_id }}" class="btn btn-primary d-block w-25 float-end mx-auto">Isi Form Kerjasama</a><br>
                            @endif
                        @endif

                        @if( $data['id'] == 7 && $data2 )
                             @if($data2->status == 1 && $data['id'] == $data2->jenis_id)
                                <a href="/input-kunjin/?jenis_id={{ $data['id'] }}&daftar_mou_id={{ $data2->daftar_mou_id }}" class="btn btn-primary d-block w-25 float-end mx-auto">Isi Form Kerjasama</a><br>
                            @endif
                        @endif

                        @if( $data['id'] == 8 && $data2 )
                            @if($data2->status == 1 && $data['id'] == $data2->jenis_id)
                                <a href="/input-suvervisi/?jenis_id={{ $data['id'] }}&daftar_mou_id={{ $data2->daftar_mou_id }}" class="btn btn-primary d-block w-25 float-end mx-auto">Isi Form Kerjasama</a><br>
                            @endif
                        @endif

                        @if( $data['id'] == 9 && $data2 )
                            @if($data2->status == 1 && $data['id'] == $data2->jenis_id)
                                <a href="/input-teaching/?jenis_id={{ $data['id'] }}&daftar_mou_id={{ $data2->daftar_mou_id }}" class="btn btn-primary d-block w-25 float-end mx-auto">Isi Form Kerjasama</a><br>
                            @endif
                        @endif
                    
                  
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection