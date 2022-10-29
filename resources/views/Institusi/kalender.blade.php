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
    <style>

    </style>
    <!-- /END GA -->
</head>

@extends('institusi')
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
                            @if ($tanggal)
                                <div id="myEvent">
                                    @if ($deff > 30)
                                        <div id="custom-target">
                                      
                                        </div>
                                    @endif
                                </div>
                            @else()
                                <div id="myEvent">
                                
                              
                                </div>
                            @endif
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


    <!-- Template JS File -->
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script>
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
                @if($row->status == 1)
                    {
                        title: '{{ 'tanggal mulai kerjasama' }}',
                        start: '{{ $row->tanggal_mulai }}',
                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                @endforeach
                @foreach ($mou as $row)
                @if($row->status == 1)
                    {
                        title: '{{ 'tanggal akhir kerjasama' }}',
                        start: '{{ $row->tanggal_akhir }}',
                       
                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                 @endif
                @endforeach
                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 1)
                    {
                        title: '{{ 'Awal Mulai Prakerin' }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',
                        start: '{{ $magang->kerjasama->tanggal_awal }}',
                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                @endforeach

                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 1)
                    {
                        title: '{{ 'Tanggal Akhir Prakerin' }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',
                        start: '{{ $magang->kerjasama->tanggal_akhir }}',
                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach

                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 2)
                    {
                        title: '{{ 'Pelaksanaan rekrutmen calon karyawan' }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_awal }}',

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                @endforeach

                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 2)
                    {
                        title: '{{ 'Pelaksanaan rekrutmen calon karyawan' }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_akhir }}',


                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach
                
                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 3)
                    {
                        title: '{{ 'Sinkronisasi Kurikulum' }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_awal }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                @endforeach

                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 3)
                    {
                        title: '{{ 'Sinkronisasi Kurikulum' }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_akhir }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach

                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 4)
                    {
                        title: '{{ 'Guru Tamu' }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_awal }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                @endforeach

                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 4)
                    {
                        title: '{{ 'Guru Tamu' }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_akhir }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach
              
                
                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 5)
                    {
                        title: '{{ 'Magang Guru' }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_awal }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach
                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 5)
                    {
                        title: '{{ 'Pelaksanaan Magang Guru' }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_akhir }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach

                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 6)
                    {
                        title: '{{ 'Pengajuan Pelaksanaan Ujikom' }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_awal }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach
                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 6)
                    {
                        title: '{{ 'Tanggal Pelaksanaan Ujikom' }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_akhir }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach

                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 7)
                    {
                        title: '{{ 'Pengajuan Kunjungan Peserta' }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_awal }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach
                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 7)
                    {
                        title: '{{ 'Pelaksanaan Kunjungan Peserta' }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_akhir }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach
                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 8)
                    {
                        title: '{{ 'Pengajuan Kunjungan Suvervisi' }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_awal }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach
                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 8)
                    {
                        title: '{{ 'Tanggal Pelaksanaan Kunjungan Suvervisi' }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_akhir }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach
                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 9)
                    {
                        title: '{{ 'Pengajuan Teaching Vactory' }}',
                        description: '{{ $magang->kerjasama->institusi->nama_institusi  }}<br>tanggal awal : {{$magang->kerjasama->tanggal_awal}}<br>tanggal akhir : {{$magang->kerjasama->tanggal_akhir}}<br> Jenis Kerjasama : {{$magang->jenis->jenis}}',

                        start: '{{ $magang->kerjasama->tanggal_awal }}',
                    

                        color: '{{ 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.73)' }}'
                    },
                    @endif
                    
                @endforeach
                @foreach ($kerjasama as $magang)
                @if($magang->daftar == 9)
                    {
                        title: '{{ 'Tanggal Pelaksanaan Teaching Vactory' }}',
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
        @if ($tanggal)
        @if (\Carbon\Carbon::parse(\Carbon\Carbon::now())->diffInYears($tanggal->tanggal_akhir) < 30  && \Carbon\Carbon::parse(\Carbon\Carbon::now())->diffInYears($tanggal->tanggal_akhir) > 0 ) 
            Swal.fire({
                text: '{{ 'Kerjasama akan berakhir pada ' . $tanggal->tanggal_akhir }}',
                toast: true,
                position: 'bottom-right'
            })  
        
        @endif
        @endif
    </script>
@endsection