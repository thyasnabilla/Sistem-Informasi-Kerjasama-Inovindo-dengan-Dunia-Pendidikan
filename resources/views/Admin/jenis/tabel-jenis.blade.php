@extends('admin')
 @section('container')
     <div class="section-header">
         <h1>Kelola Jenis Permohonan</h1>
     </div>
     <div class="section-body">
         <div class="card">
             
             @if (session()->has('success'))
                 <div class="alert alert-success" role="alert">
                     {{ session('success') }}
                 </div>
             @endif
            
                     <div class="card">
                         <div class="card-body">
                            
                                 <table class="table table-striped overflow-auto" id="example">
                                     <thead>
                                         <tr>
                                             <th>
                                                 No
                                             </th>
                                             <th>Jenis Kerjasama</th>
                                             <th>Gambar</th>
                                             <th>Isi</th>
                                             <th>Aksi</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach ($jenis as $item)
                                             <tr>
                                                 <td>
                                                     {{ ++$i }}
                                                 </td>
                                                 <td> {{ $item->jenis }}</td>
                                                 <td>
                                                     <img src="{{ asset('/storage/' . $item['gambar']) }}"
                                                         alt="{{ $item->gambar }}" title="" width="80px"
                                                         class="m-4">
                                                 </td>
                                                 <td> {!! Str::limit($item->isi, 450, '...')!!} </td>
                                                 <td>
                                                     <a href="/admin/edit-jenis/{{ $item->id }}"
                                                         class="btn btn-secondary"><span
                                                             class="fas fa-edit"></span></a>&nbsp;&nbsp;&nbsp;
                                                    
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
