<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center><h1>{{$resto}}</h1></center>
    @foreach ( $data as $makanan )
        Nama : {{$makanan['nama_makanan']}}
        Harga : {{$makanan['harga']}}
        jumlah : {{$makanan['jumlah']}}
        @php $total = $makanan['jumlah'] * $makanan['harga']; @endphp
        total : {{$total}}
        @if ($total . 15000)
            <br>Keterangan : Anda mendapatkan diskon 15.000
        @else
            <br>Keterangan : Anda tidak mendapatkan diskon
            
        @endif
        <hr>        
    @endforeach
</body>
</html>