 @extends('admin')
 @section('container')
     <div class="section-header">
         <h1>Daftar Permohonan</h1>
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
                                             <th>Nama Institusi</th>
                                             <th>Jenis Permohonan</th>
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
                                             <td>{{ $item->institusi['nama_institusi'] }}</td>
                                             <td>  
                                                @foreach($item->daftar_mou as $row)
                                                - {{ $row->jenis['jenis']}} <br>
                                              @endforeach
                                            </td>
                                             <td>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMMM Y  hh:mm ') }}</td>
                                             <td>
                                                @if( $item->status == 0 )
                                                  @if( $item->status == 0 )
                                                <a href="{{ url('update-diterima/'. $item->id)}}" class="btn btn-success">Terima</a>
                                                @endif
                                                @if( $item->status == 0 )
                                                <a href="{{ url('update-ditolak/'. $item->id)}}" class="btn btn-danger">Tolak</a>
                                                @endif
                                                @elseif( $item->status == 1)
                                                 <div class="badge badge-success">Diterima</div>
                                                @else()
                                                <div class="badge badge-danger">Ditolak</div>
                                                @endif
                                             </td>
                                             <td>
                                                <a href="/admin/permohonan-admin/detail/{{ $item['id'] }}" class="btn btn-secondary"><span class="fas fa-eye"></span></a>&nbsp;
                                                <a href="{{ url('/admin/download-mou/'. $item->id) }}" target="_blank" class="btn btn-primary"><i class="bi bi-download"></i></a>
                                            </td>
                                         </tr>
                                        @endforeach
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
    
     </div>
 @endsection
