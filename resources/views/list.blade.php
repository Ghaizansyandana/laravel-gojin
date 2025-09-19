<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center>{{ $toko }}</center>
    @foreach ( $barang as $stok )
        Nama : {{  $stok['nama_barang'] }} <br>
        Harga : {{  $stok['harga'] }} <br>
        Jumlah : {{  $stok['qty'] }} <br>
        @php $total = $stok['harga'] * $stok['qty']; @endphp
        Total : {{  $total }} <br>
        @if ($total > 25000)
            <br>Keterangan : Anda mendapatkan diskon 15.000
        @else
            <br>Keterangan : Anda tidak mendapatkan diskon
        @endif
        <hr>
    @endforeach
</body>
</html>