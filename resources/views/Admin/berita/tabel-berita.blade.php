 @extends('admin')
 @section('container')
     <div class="section-header">
         <h1>Kelola Berita</h1>
     </div>
     <div class="section-body">
         <div class="card">
             <div class="card-header text-decoration-none">
                 <button class="btn btn-primary"><a href="/admin/input-berita" class="text-light text-decoration-none"> + Tambah
                         Berita
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
                                             <th>Judul Berita</th>
                                             <th>Gambar</th>
                                             <th>Pengunjung</th>
                                             <th>Aksi</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach ($tabelberita as $item)
                                             <tr>
                                                 <td>
                                                     {{ ++$i }}
                                                 </td>
                                                 <td> {{ $item->judul }}</td>
                                                 <td>
                                                     <img src="{{ asset('/storage/' . $item['gambar']) }}"
                                                         alt="{{ $item->gambar }}" title="" width="200px"
                                                         class="m-4">
                                                 </td>
                                                 <td> {{ $item->pengunjung }}</td>
                                                 <td>
                                                     <a href="/admin/edit-berita/{{ $item->id }}"
                                                         class="btn btn-secondary"><span
                                                             class="fas fa-edit"></span></a>&nbsp;&nbsp;&nbsp;
                                                     <form action="admin/tabel-berita/hapus/{{ $item->id }}"
                                                         method="post" class="d-inline">
                                                         @method('hapus')
                                                         @csrf
                                                         <a href="/admin/tabel-berita/hapus/{{ $item->id }}"
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
