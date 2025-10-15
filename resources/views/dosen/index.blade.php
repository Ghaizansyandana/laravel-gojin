<!DOCTYPE html>
<html>
<head>
    <title>Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Data Dosen</h2>
    <a href="{{ route('dosen.create') }}" class="btn btn-primary mb-3">+ Tambah Dosen</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIPD</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dosens as $dosen)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dosen->nama }}</td>
                    <td>{{ $dosen->nipd }}</td>
                    <td>
                        <a href="{{ route('dosen.show', $dosen->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data dosen.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
