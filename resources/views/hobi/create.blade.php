<!DOCTYPE html>
<html>
<head>
    <title>Tambah Hobi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Tambah Hobi</h2>

    <form action="{{ route('hobi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama hobi</label>
            <input type="text" name="nama_hobi" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('hobi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
