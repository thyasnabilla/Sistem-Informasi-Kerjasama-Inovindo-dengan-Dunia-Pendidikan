@extends('institusi')
 @section('container')
     <div class="section-header">
         <h1>Daftar Kerjasama</h1>
     </div>
     <div class="section-body">
         <div class="card">
            <div class="card-body" style="overflow:hidden;">
                    <table class="table table-striped" id="example">
                        <thead>
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>Tanggal Pengajuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($daftar_mou as $item)
                            <tr>
                                <td>
                                    {{ ++$i}}
                                </td>
                                <td>{{ $item->mou->institusi['nama_institusi'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
             </div>
         </div>
     </div>
 @endsection
