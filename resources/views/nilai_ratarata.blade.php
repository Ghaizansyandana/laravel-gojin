<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>⿤ Rata-rata Nilai Kelas</h2>

        @foreach ($siswa as $data)
            Nama: {{ $data['nama'] }} <br>
            Nilai: {{ $data['nilai'] }} <br><br>
        @endforeach

        <hr>
        Rata-rata: {{ $rata }} <br>

        @if ($rata >= 75)
            <b>Status Kelas: Lulus</b>
        @else
            <b>Status Kelas: Remedial</b>
        @endif

</body>
</html>