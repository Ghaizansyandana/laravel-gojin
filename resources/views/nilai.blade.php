<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center><h1>Raport siswa</h1></center>
        @foreach ($data as $nilai)
            Nama : {{ $nilai['nama'] }} <br>
            Mata Pelajaran : {{ $nilai['mapel'] }} <br>
            Nilai : {{ $nilai['nilai'] }} <br>
            @if ($nilai['nilai'] >= 70)
                Keterangan : Lulus
            @else
                Keterangan : Tidak Lulus
            @endif
        @endforeach
</body>
</html>