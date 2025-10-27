@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Wali</h2>
    <a href="{{ route('wali.create') }}" class="btn btn-primary mb-3">Tambah Wali</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Wali</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($walis as $wali)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $wali->nama_wali }}</td>
                <td>{{ $wali->alamat }}</td>
                <td>{{ $wali->no_telepon }}</td>
                <td>
                    <a href="{{ route('wali.edit', $wali->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('wali.destroy', $wali->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data wali.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection