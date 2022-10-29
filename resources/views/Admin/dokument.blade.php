
@extends('admin')
@section('container')
          <div class="section-header">
            <h1>Dokumen</h1>
 
          </div>

          <div class="section-body">
        
                <div class="card">
                  <div class="card-body">
             
                      <table class="table table-striped" id="example">
                        <thead>                                 
                          <tr>
                            <th>
                              No.
                            </th>
                            <th>Nama Institusi</th>
                            <!-- <th>Jenis Dokumen</th> -->
                            <!-- <th>Keterangan</th> -->
                            <th>Download</th>
                          </tr>
                        </thead>
                        <tbody> 
                          @foreach($dokumen as $item)                                
                        <tr>
                            <td>{{ ++$i}}</td>
                            <td>
                              @if($item->mou )
                              {{ $item->mou->institusi->nama_institusi }}
                              @else
                              {{ $item->kerjasama->institusi->nama_institusi }}

                              @endif</td>
                            <!-- <td>
                              @if($item->mou )
                              Mou
                              @else
                              Kerjasama
                              @endif
                            </td> -->
                            <!-- <td>{{ $item->keterangan }}</td> -->
                            <td>
                            
                                        <a href="{{ asset('/storage/' .$item->nama_dokumen) }}" class="btn btn-primary d-block w-50 loat-end mx-2 mt-3">{{ $item->keterangan}}</a><br>
                                    
                                 
                            </td>
                        
                        </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
   
@endsection