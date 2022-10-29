<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Sistem Informasi Kerjasama Inovindo dengan Dunia Pendidikan</title>


    <!-- General CSS Files -->
    <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../assets/modules/fullcalendar/fullcalendar.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

@extends('admin')
@section('container')
    <div class="section-header">
        <h1>Kalender</h1>
    </div>
    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="fc-overflow">
                            <div id="myEvent"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/modules/jquery.min.js"></script>
    <script src="../assets/modules/popper.js"></script>
    <script src="../assets/modules/tooltip.js"></script>
    <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="../assets/modules/moment.min.js"></script>
    <script src="../assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="../assets/modules/fullcalendar/fullcalendar.min.js"></script>

    <!-- Page Specific JS File -->
    <!-- <script src="../assets/js/page/modules-calendar.js"></script> -->

    <!-- Template JS File -->
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script>
            "use strict";
            $("#myEvent").fullCalendar({
                height: 'auto',
                eventClick: function(e){
                Swal.fire(e.description);
            },
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek'
                },
                editable: true,
                events: [
                    @foreach ($mou as $row)
                        {
                            title: 'Awal Kerjasama {{ $row->institusi['nama_institusi'] }}',
                            start: '{{ $row->tanggal_mulai }}',
                            color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}',
                          
                        },
                    @endforeach
                    @foreach ($mou as $row)
                        {
                            title: 'Akhir Kerjasama {{ $row->institusi['nama_institusi'] }}',
                            start: '{{ $row->tanggal_akhir }}',
                            color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}',
                          
                        },
                    @endforeach
                     @foreach ($kerjasama as $magang)
                @if($magang->daftar == 1)
                    {
                        title: '{{ 'Awal Mulai Prakerin' }} {{ $magang->kerjasama->institusi['nama_institusi'] }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',
                        start: '{{ $magang->kerjasama->tanggal_awal }}',
                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                @endforeach

                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 1)
                    {
                        title: '{{ 'Tanggal Akhir Prakerin' }} {{ $magang->kerjasama->institusi['nama_institusi'] }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',
                        start: '{{ $magang->kerjasama->tanggal_akhir }}',
                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach

                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 2)
                    {
                        title: '{{ 'Pelaksanaan rekrutmen calon karyawan' }}  {{ $magang->kerjasama->institusi['nama_institusi'] }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_awal }}',

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                @endforeach

                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 2)
                    {
                        title: '{{ 'Pelaksanaan rekrutmen calon karyawan' }} {{ $magang->kerjasama->institusi['nama_institusi'] }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_akhir }}',


                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach
                
                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 3)
                    {
                        title: '{{ 'Pengajuan Sinkronisasi Kurikulum' }} {{ $magang->kerjasama->institusi['nama_institusi'] }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_awal }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                @endforeach

                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 3)
                    {
                        title: '{{ 'Pelaksanaan Sinkronisasi Kurikulum' }} {{ $magang->kerjasama->institusi['nama_institusi'] }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_akhir }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach

                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 4)
                    {
                        title: '{{ 'Pengajuan Guru Tamu' }} {{ $magang->kerjasama->institusi['nama_institusi'] }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_awal }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                @endforeach

                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 4)
                    {
                        title: '{{ 'Pelaksanaan Guru Tamu' }} {{ $magang->kerjasama->institusi['nama_institusi'] }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_akhir }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach
              
                
                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 5)
                    {
                        title: '{{ 'Awal Magang Guru' }} {{ $magang->kerjasama->institusi['nama_institusi'] }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_awal }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach
                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 5)
                    {
                        title: '{{ 'Akhir Magang Guru' }} {{ $magang->kerjasama->institusi['nama_institusi'] }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_akhir }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach

                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 6)
                    {
                        title: '{{ 'Pengajuan Pelaksanaan Ujikom' }} {{ $magang->kerjasama->institusi['nama_institusi'] }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_awal }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach
                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 6)
                    {
                        title: '{{ 'Tanggal Pelaksanaan Ujikom' }} {{ $magang->kerjasama->institusi['nama_institusi'] }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_akhir }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach

                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 7)
                    {
                        title: '{{ 'Pengajuan Kunjungan Peserta' }} {{ $magang->kerjasama->institusi['nama_institusi'] }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_awal }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach
                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 7)
                    {
                        title: '{{ 'Pelaksanaan Kunjungan Peserta' }} {{ $magang->kerjasama->institusi['nama_institusi'] }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_akhir }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach
                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 8)
                    {
                        title: '{{ 'Pengajuan Kunjungan Suvervisi' }} {{ $magang->kerjasama->institusi['nama_institusi'] }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_awal }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach
                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 8)
                    {
                        title: '{{ 'Tanggal Pelaksanaan Kunjungan Suvervisi' }} {{ $magang->kerjasama->institusi['nama_institusi'] }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_akhir }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach
                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 9)
                    {
                        title: '{{ 'Pengajuan Teaching Vactory' }} {{ $magang->kerjasama->institusi['nama_institusi'] }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_awal }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach
                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 9)
                    {
                        title: '{{ 'Tanggal Pelaksanaan Teaching Vactory' }} {{ $magang->kerjasama->institusi['nama_institusi'] }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_akhir }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach        
                ]
            });
        </script>
           <script>
            @foreach($mou as $row)
        
        @if (\Carbon\Carbon::parse(\Carbon\Carbon::now())->diffInYears($row->tanggal_akhir) < 30) 
            Swal.fire({
                text:  'Kerjasama {{ $row->institusi['nama_institusi'] }}  akan berakhir pada {{ $row->tanggal_akhir }}',
                toast: true,
                position: 'bottom-right'
            })  
        
        @endif
    
        @endforeach
    </script>
@endsection
