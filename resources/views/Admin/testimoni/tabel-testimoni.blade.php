@extends('admin')
 @section('container')
     <div class="section-header">
         <h1>Kelola Testimoni</h1>
     </div>
     <div class="section-body">
         <div class="card">
             <div class="card-header text-decoration-none">
                 <button class="btn btn-primary"><a href="/admin/input-testimoni" class="text-light text-decoration-none"> + Tambah Testimoni
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
                                             <th>Nama Institusi</th>
                                             <th>Isi</th>
                                             <th>Aksi</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach ($testimoni as $item)
                                             <tr>
                                                 <td>
                                                     {{ ++$i }}
                                                 </td>
                                                 <td> {{ $item->institusi['nama_institusi']}}</td>
                                                 <td> {!! $item->isi !!}</td>
                                                 <td>
                                                     <a href="/admin/edit-testimoni/{{ $item->id }}"
                                                         class="btn btn-secondary"><span
                                                             class="fas fa-edit"></span></a>&nbsp;&nbsp;&nbsp;
                                                     <form action="/admin/tabel-testimoni/hapus/{{ $item->id }}"
                                                         method="post" class="d-inline">
                                                         @method('hapus')
                                                         @csrf
                                                         <a href="/admin/tabel-testimoni/hapus/{{ $item->id }}"
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
