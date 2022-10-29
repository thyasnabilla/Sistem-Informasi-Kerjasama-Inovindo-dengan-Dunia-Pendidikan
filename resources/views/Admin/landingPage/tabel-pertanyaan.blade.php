@extends('admin')
 @section('container')
     <div class="section-header">
         <h1>Kelola Pertanyaan</h1>
     </div>
     <div class="section-body">
         <div class="card">
         <div class="card-header text-decoration-none">
                 <button class="btn btn-primary"><a href="/admin/input-pertanyaan" class="text-light text-decoration-none"> + Tambah
                         Pertanyaan
                     </a></button>
             </div>
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
                                             <th width="300px">Pertanyaan</th>
                                             <th width="400px">Jawaban</th>
                                             <th>Aksi</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach ($pertanyaan as $item)
                                             <tr>
                                                 <td>
                                                     {{ ++$i }}
                                                 </td>
                                                 <td> {{ $item->pertanyaan }}</td>
                                                 <td> {{$item->jawaban}} </td>
                                                 <td>
                                                     <a href="/admin/edit-pertanyaan/{{ $item->id }}"
                                                         class="btn btn-secondary"><span
                                                             class="fas fa-edit"></span></a>&nbsp;&nbsp;&nbsp;
                                                     <form action="admin/pertanyaan/hapus/{{ $item->id }}"
                                                         method="post" class="d-inline">
                                                         @method('hapus')
                                                         @csrf
                                                         <a href="/admin/pertanyaan/hapus/{{ $item->id }}"
                                                             class="btn btn-danger"
                                                             onclick="return confirm('Hapus data ini?')"><span
                                                                 class="fas fa-trash-alt"></span></a>
                                                     </form>
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
