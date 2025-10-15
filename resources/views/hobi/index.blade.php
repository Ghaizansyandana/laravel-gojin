<!DOCTYPE html>
<html>

<head>
    <title>Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Data Hobi</h2>
        <a href="{{ route('hobi.create') }}" class="btn btn-primary mb-3">+ Tambah Hobi</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($hobis as $hobi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $hobi->nama_hobi }}</td>
                        <td>
                            <a href="{{ route('hobi.show', $hobi->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('hobi.edit', $hobi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('hobi.destroy', $hobi->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus data ini?')"
                                    class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada data hobi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>
