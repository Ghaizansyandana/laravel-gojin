<!DOCTYPE html>
<html>
<head>
    <title>Detail Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Detail Dosen</h2>

    <table class="table">
        <tr>
            <th>Nama</th>
            <td>{{ $dosen->nama }}</td>
        </tr>
        <tr>
            <th>NIPD</th>
            <td>{{ $dosen->nipd }}</td>
        </tr>
    </table>

    <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
</div>
</body>
</html>

