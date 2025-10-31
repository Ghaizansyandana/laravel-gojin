@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Pelanggan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary mb-3">+ Tambah Pelanggan</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pelanggans as $pelanggan)
                <tr>
                    <td>{{ $pelanggan->id }}</td>
                    <td>{{ $pelanggan->nama }}</td>
                    <td>{{ $pelanggan->no_hp }}</td>
                    <td>{{ $pelanggan->alamat }}</td>
                    <td>
                        <a href="{{ route('pelanggan.show', $pelanggan->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus pelanggan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
