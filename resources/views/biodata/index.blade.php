@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Daftar Biodata</h2>

    <a href="{{ route('biodata.create') }}" class="btn btn-primary mb-3">+ Tambah Biodata</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>JK</th>
                <th>Agama</th>
                <th>Alamat</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($biodata as $index => $data)
            <tr>
                <td>{{ $index + $biodata->firstItem() }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->jk }}</td>
                <td>{{ $data->agama }}</td>
                <td>{{ $data->alamat }}</td>
                <td>
                    @if($data->foto)
                        <img src="{{ asset('storage/biodata/' . $data->foto) }}" width="60" alt="foto">
                    @else
                        <small>Tidak ada</small>
                    @endif
                </td>
                <td>
                    <a href="{{ route('biodata.show', $data->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('biodata.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('biodata.destroy', $data->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $biodata->links() }}
</div>
@endsection
