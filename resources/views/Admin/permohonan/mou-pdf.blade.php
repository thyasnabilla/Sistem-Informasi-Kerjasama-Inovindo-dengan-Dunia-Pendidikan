<!-- <link rel="stylesheet" href="/../assets/css/style.css">  -->
<!-- Tidak berguna karena tidak bisa terinclude -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            border:1px solid black;
            line-height:25px;
        }
        img{
            width:80px;
            margin-top:50px;
            position:absolute;
            margin-left:40px;
        }
        #h{
            width:100px;
            margin-top:10px;
            position:absolute;
            margin-left:550px;
        }
        .p1{
            width:700px;
            margin-left:15px;
            
           
            
        }
        .p2{
            width:700px;
            margin-left:15px;
            margin-top:20px;
            

            
        }
        .p3{
            width:700px;
            margin-left:15px;
            margin-top:20px;
            

            
        }
        .p{
            width:250px;
            margin-left:450px;
            margin-top:105px;
            
        }
        .p4{
            margin-top:105px;
            width:250px;
            margin-left:30px;
            position:absolute;
            
        }

    </style>
</head>
<body>
   
        
        <img src="{{ public_path('/storage/'.$mou->institusi['logo']) }}" alt=""><br>
        <img src="{{ public_path('/storage/'.$mou->perusahaan['logo']) }}" alt="" id="h"><br>
        <h3 style="text-align: center">PIAGAM KERJASAMA <br> PT. INOVINDO DIGITAL MEDIA</h3><br><hr><br>
    
    <div class="p1">
    &nbsp;&nbsp;&nbsp;    Pada hari <b> {{ \Carbon\Carbon::parse($mou->created_at)->locale('id')->isoFormat('dddd') }} </b>  tanggal<b>{{ \Carbon\Carbon::parse($mou->created_at)->locale('id')->isoFormat(' DD') }}</b> bulan <b>{{ \Carbon\Carbon::parse($mou->created_at)->locale('id')->isoFormat('MMMM') }} </b>tahun <b> {{ \Carbon\Carbon::parse($mou->created_at)->locale('id')->isoFormat('YYYY') }}</b> telah diadakan penandatanganan naskah kerjasama dengan
    <b> {{ $mou->perusahaan['nama_perusahaan'] }} </b> yang beralamat di Komplek Buana Citra Ciwastra blok c.15 jln.Batusari no.27  Buah Batu Bojongsoang.
    
    </div>
    <div class="p2">
        1.<b> {{ $mou->institusi->institusi_pimpinan['nama_pimpinan'] }}</b> selaku Kepala <b>{{ $mou->institusi['nama_institusi'] }}</b> , selanjutnya disebut pihak Pertama <br>
        2.<b> {{ $mou->perusahaan['nama_pimpinan'] }}</b> selaku Direktur <b>{{ $mou->perusahaan['nama_perusahaan'] }}</b>  , selanjutnya disebut pihak Kedua
    </div>
    <div class="p3">
     Pihak Pertama dan Kedua sepakat untuk mengadakan Kerjasama dalam rangka :  
        <div class="jenis">

            @foreach($mou->daftar_mou as $row)
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - {{ $row->jenis['jenis']}} <br>
            @endforeach
        </div>
     </div>
  
        <div class="p4">
            Pihak Kedua,<br>
            Direktur {{ $mou->perusahaan['nama_perusahaan'] }} <br><br><br><br><br><br>
            {{ $mou->perusahaan['nama_pimpinan'] }}
        </div>
        <div class="p">
            Bandung, {{ \Carbon\Carbon::now()->locale('id')->isoFormat(' DD MMMM YYYY') }} <br>
            Pihak Pertama,<br>
            Kepala {{ $mou->institusi['nama_institusi'] }} <br><br><br><br><br>
            {{ $mou->institusi->institusi_pimpinan['nama_pimpinan'] }}
        </div>

</body>
</html>



