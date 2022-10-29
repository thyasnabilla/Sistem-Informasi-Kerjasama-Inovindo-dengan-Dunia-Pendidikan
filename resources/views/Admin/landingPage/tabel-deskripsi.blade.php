@extends('admin')
 @section('container')
     <div class="section-header">
         <h1>Kelola Deskripsi Landing Page</h1>
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
                            
                                 <table class="table table-striped overflow-auto">
                                     <thead>
                                         <tr>
                                            
                                             <th>Deskripsi Profil</th>
                                             <th>Gambar</th>
                                             <th>Aksi</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach ($landingpage as $item)
                                             <tr>
                                               
                                                 <td>  {!! strip_tags($item->deskripsi_profil) !!}</td>
                                                 <td>
                                                     <img src="{{ asset('/storage/' . $item['gambar']) }}"
                                                         alt="{{ $item->gambar }}" title="" width="200px"
                                                         class="m-4">
                                                 </td>
                                                
                                                
                                                 <td>
                                                     <a href="/admin/edit-jenis/{{ $item->id }}"
                                                         class="btn btn-primary"><span
                                                             class="fas fa-edit"></span></a>&nbsp;&nbsp;&nbsp;
                                                    
                                                 </td>
                                             </tr>
                                         @endforeach
                                     </tbody>
                                 </table>
                             </div>
                         </div>

                         <div class="card">
                         <div class="card-body">
                            
                                 <table class="table table-striped overflow-auto">
                                     <thead>
                                         <tr>
                                            
                                             <th>Deskripsi Tentang Kami</th>
                                             <th>Video</th>
                                             <th>Aksi</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach ($landingpage as $item)
                                             <tr>
                                                
                                                 <td> {!! strip_tags(Str::limit($item->deskripsi_tentang_kami,200)) !!} </td>
                                                 <td>
                                                     <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="{{$item->video}}"></iframe>
                                                      </div>
                                                </td>
                                                 <td>
                                                     <a href="/admin/edit-jenis/{{ $item->id }}"
                                                         class="btn btn-primary"><span
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
