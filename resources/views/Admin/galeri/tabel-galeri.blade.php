@extends('admin')
 @section('container')
     <div class="section-header">
         <h1>Kelola Galeri</h1>
     </div>
     <div class="section-body">
         <div class="card">
             <div class="card-header text-decoration-none">
                 <button class="btn btn-primary"><a href="/admin/input-galeri" class="text-light text-decoration-none"> + Tambah
                         Galeri
                     </a></button>
             </div>
             @if (session()->has('success'))
                 <div class="alert alert-success" role="alert">
                     {{ session('success') }}
                 </div>
             @endif
           
                     <div class="card">
                         <div class="card-body">
                             
                                 <table class="table table-striped overflow-auto w-75" id="example" >
                                     <thead>
                                         <tr>
                                             <th>
                                                 No
                                             </th>
                                             <th>Gambar</th>
                                             <th>Aksi</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach ($gallery as $item)
                                             <tr>
                                                 <td>
                                                     {{ ++$i }}
                                                 </td>
                                                 <td>
                                                     <img src="{{ asset('/storage/' . $item['gambar']) }}"
                                                         alt="{{ $item->gambar }}" title="" width="100px"
                                                         class="m-4">
                                                 </td>
                                                 <td>
                                                     <form action="/admin/tabel-galeri/hapus/{{ $item->id }}"
                                                         method="post" class="d-inline">
                                                         @method('hapus')
                                                         @csrf
                                                         <a href="/admin/tabel-galeri/hapus/{{ $item->id }}"
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
