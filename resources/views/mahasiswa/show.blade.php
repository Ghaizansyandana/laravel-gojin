<!DOCTYPE html>
<html>
<head>
    <title>Detail Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Detail Mahasiswa</h2>

    <table class="table">
        <tr>
            <th>Nama</th>
            <td>{{ $mahasiswa->nama }}</td>
        </tr>
        <tr>
            <th>NIM</th> <td>{{ $mahasiswa->nim }}</td>
        </tr>
        <tr>
            <th>Nama Dosen</th>
            <td>{{ $mahasiswa->dosen?->nama ?? 'Tidak Ada Dosen' }}</td>
        </tr>
    </table>

    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
</div>
</body>
</html>