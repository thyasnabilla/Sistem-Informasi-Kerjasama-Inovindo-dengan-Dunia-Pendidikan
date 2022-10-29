@extends('institusi')
 @section('container')
     <div class="section-header">
         <h1>Daftar Kerjasama</h1>
     </div>
     <div class="section-body">
         <div class="card">
            <div class="card-body" style="overflow:hidden;">
                    <table class="table table-striped" id="example">
                        <thead>
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>Nama Institusi</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Jenis Permohonan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($daftar_mou as $item)
                            <tr>
                                <td>
                                    {{ ++$i}}
                                </td>
                                <td>{{ $item->mou->institusi['nama_institusi'] }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->mou->created_at)->isoFormat('dddd, D MMMM Y  hh:mm ') }}</td>
                                <td>
                                {{ $item->jenis->jenis }}
                                
                                </td>
                            <td>
                            @if( $item->jenis->id == 1 )
                                    <a href="/kerjasama/detail-pkl/{{ $item['id'] }}" class="btn btn-primary d-block w-75 loat-end mx-auto mt-3">Detail</a><br>
                            @endif
                            @if( $item->jenis->id == 2 )
                                    <a href="/kerjasama/detail-rekrut/{{ $item['id'] }}" class="btn btn-primary d-block w-75  float-end mx-auto mt-3">Detail</a><br>
                            @endif
                            @if( $item->jenis->id == 3 )
                                    <a href="/kerjasama/detail-kurikulum/{{ $item['id'] }}" class="btn btn-primary d-block w-75  float-end mx-auto mt-3">Detail</a><br>
                            @endif
                            @if( $item->jenis->id == 4 )
                                    <a href="/kerjasama/detail-gurutamu/{{ $item['id'] }}" class="btn btn-primary d-block w-75  float-end mx-auto mt-3">Detail</a><br>
                            @endif
                            @if( $item->jenis->id == 5 )
                                    <a href="/kerjasama/detail-magang/{{ $item['id'] }}" class="btn btn-primary d-block w-75  float-end mx-auto mt-3">Detail</a><br>
                            @endif
                            @if( $item->jenis->id == 6 )
                                    <a href="/kerjasama/detail-ujikom/{{ $item['id'] }}" class="btn btn-primary d-block w-75  float-end mx-auto mt-3">Detail</a><br>
                            @endif
                            @if( $item->jenis->id == 7 )
                                    <a href="/kerjasama/detail-kunjin/{{ $item['id'] }}" class="btn btn-primary d-block w-75  float-end mx-auto mt-3">Detail</a><br>
                            @endif
                            @if( $item->jenis->id == 8 )
                                    <a href="/kerjasama/detail-suvervisi/{{ $item['id'] }}" class="btn btn-primary d-block w-75  float-end mx-auto mt-3">Detail</a><br>
                            @endif
                            @if( $item->jenis->id == 9 )
                                    <a href="/kerjasama/detail-teaching/{{ $item['id'] }}" class="btn btn-primary d-block w-75  float-end mx-auto mt-3">Detail</a><br>
                            @endif                                            
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
             </div>
         </div>
     </div>
 @endsection
