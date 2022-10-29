@extends('institusi')
 @section('container')
     <div class="section-header">
         <h1>Data Pimpinan</h1>
         
     </div>
     
     <div class="section-body">
         <div class="card">
            
                         <div class="card-body">
                         <button class="btn btn-primary"><a href="/input/pimpinan" class="text-light text-decoration-none"> + Tambah
                                    Pimpinan
                                </a></button>
                                 <table class="table table-striped" id="example">
                                     <thead>
                                         <tr>
                                             <th>
                                                 No
                                             </th>
                                             <th>Nama Pimpinan</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                        @foreach($pimpinan as $item)
                                        <tr>
                                             <td>
                                                 {{ ++$i }}
                                             </td>
                                            <td>{{$item->nama_pimpinan}}</td>
                                        </tr>
                                        @endforeach
                                     </tbody>
                                 </table>
                             </div>
                         </div>
     </div>
 @endsection
