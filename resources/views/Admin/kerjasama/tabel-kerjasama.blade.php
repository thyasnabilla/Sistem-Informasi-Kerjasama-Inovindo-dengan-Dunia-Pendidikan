 @extends('admin')
 @section('container')
     <div class="section-header">
         <h1>Daftar Kerjasama</h1>
     </div>
     <div class="section-body">
         <div class="card">
                     <div class="card">
                         <div class="card-body">
                            
                                 <table class="table table-striped" id="example">
                                     <thead>
                                         <tr>
                                             <th>
                                                 No
                                             </th>
                                             <th class="w-25">Nama Institusi</th>
                                             <th class="w-25">Tanggal Pengajuan</th>
                                             <th class="w-25">Jenis Permohonan</th>
                                             <th class="w-25"> Aksi</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach($daftar_mou as $item)
                                         @if( $item->mou->status == 1)
                                         <tr>
                                             <td>
                                                 {{ ++$i}}
                                             </td>
                                             <td>{{ $item->mou->institusi['nama_institusi'] }}</td>
                                             <td>{{ \Carbon\Carbon::parse($item->mou->created_at)->isoFormat('dddd, D MMMM Y  hh:mm ') }}</td>
                                             <td> {{ $item->jenis->jenis }}</td>
                                    
                                            <td>

                                            <!-- <form action="/admin/tabel-kerjasama/hapus/{{ $item->id }}"
                                                         method="post" class="d-inline">
                                                         @method('hapus')
                                                         @csrf
                                                         <a href="/admin/tabel-kerjasama/hapus/{{ $item->id }}"
                                                             class="btn btn-danger"
                                                             onclick="return confirm('Hapus data ini?')"><span
                                                                 class="fas fa-trash-alt"></span></a>
                                                </form> -->
                                                
                                                    @if( $item->jenis->id == 1 )
                                                            <a href="/admin/kerjasama/detail-pkl/{{ $item['id'] }}" class="btn btn-primary  w-50 loat-end mx-auto ">Detail</a><br>
                                                    @endif
                                                    @if( $item->jenis->id == 2 )
                                                            <a href="/admin/kerjasama/detail-rekrut/{{ $item['id'] }}" class="btn btn-primary  w-50  float-end mx-auto ">Detail</a><br>
                                                    @endif
                                                    @if( $item->jenis->id == 3 )
                                                            <a href="/admin/kerjasama/detail-kurikulum/{{ $item['id'] }}" class="btn btn-primary  w-50  float-end mx-auto ">Detail</a><br>
                                                    @endif
                                                    @if( $item->jenis->id == 4 )
                                                            <a href="/admin/kerjasama/detail-gurutamu/{{ $item['id'] }}" class="btn btn-primary  w-50  float-end mx-auto ">Detail</a><br>
                                                    @endif
                                                    @if( $item->jenis->id == 5 )
                                                            <a href="/admin/kerjasama/detail-magang/{{ $item['id'] }}" class="btn btn-primary  w-50  float-end mx-auto ">Detail</a><br>
                                                    @endif
                                                    @if( $item->jenis->id == 6 )
                                                            <a href="/admin/kerjasama/detail-ujikom/{{ $item['id'] }}" class="btn btn-primary  w-50  float-end mx-auto ">Detail</a><br>
                                                    @endif
                                                    @if( $item->jenis->id == 7 )
                                                            <a href="/admin/kerjasama/detail-kunjin/{{ $item['id'] }}" class="btn btn-primary  w-50  float-end mx-auto ">Detail</a><br>
                                                    @endif
                                                    @if( $item->jenis->id == 8 )
                                                            <a href="/admin/kerjasama/detail-suvervisi/{{ $item['id'] }}" class="btn btn-primary  w-50  float-end mx-auto ">Detail</a><br>
                                                    @endif
                                                    @if( $item->jenis->id == 9 )
                                                            <a href="/admin/kerjasama/detail-teaching/{{ $item['id'] }}" class="btn btn-primary  w-50  float-end mx-auto ">Detail</a><br>
                                                    @endif                                            
                                                </td>
                                                
                                            </tr>
                                            @endif
                                         @endforeach
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>

     </div>
 @endsection
