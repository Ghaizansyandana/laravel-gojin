@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Pelanggan</h2>

    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" value="{{ $pelanggan->nama }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nomer</label>
            <input type="email" name="number" value="{{ $pelanggan->no_hp }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required>{{ $pelanggan->alamat }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
