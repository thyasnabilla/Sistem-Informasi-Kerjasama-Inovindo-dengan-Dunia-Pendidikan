 @extends('institusi')
 @section('container')
     <div class="section-header">
         <h1>Daftar Permohonan</h1>
     </div>
     <div class="section-body">
         <div class="card">
                         <div class="card-body">
                                 <table class="table table-striped" id="example">
                                     <thead>
                                         <tr>
                                             <th>
                                                 No
                                             </th>
                                             <th>Tanggal Pengajuan</th>
                                             <th>Status</th>
                                             <th>Aksi</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                        @foreach($mou as $item)
                                        <tr>
                                             <td>
                                                 {{ ++$i }}
                                             </td>
                                             <td>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMMM Y  hh:mm ') }}</td>
                                             <td>
                                                @if( $item->status == 0 )
                                                 <div class="badge badge-primary">Menunggu</div>
                                                @elseif( $item->status == 1)
                                                 <div class="badge badge-success">Diterima</div>
                                                @else()
                                                <div class="badge badge-danger">Ditolak</div>
                                                @endif
                                             </td>
                                             <td>
                                                <a href="/datapermohonan/detail/{{ $item['id'] }}" class="btn btn-primary">Detail</a>
                                                @if( $item->status == 1)
                                                <a href="{{ url('/institusi/download-mou/'. $item->id) }}" target="_blank" class="btn btn-primary"><i class="bi bi-download"></i></a>
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
