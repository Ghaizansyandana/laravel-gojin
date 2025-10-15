<!DOCTYPE html>
<html>
<head>
    <title>Edit Hobi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Hobi</h2>

    <form action="{{ route('hobi.update', $hobi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Hobi</label>
            <input type="text" name="nama" value="{{ $hobi->nama_hobi }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('hobi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
