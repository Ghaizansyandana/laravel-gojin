@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Edit Hobi</h2>

        <form action="{{ route('hobi.update', $hobi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nama Hobi</label>
                <input type="text" name="nama_hobi" value="{{ old('nama_hobi', $hobi->nama_hobi) }}" class="form-control"
                    required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('hobi.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
