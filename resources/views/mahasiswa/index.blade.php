@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Mahasiswa') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('mahasiswa.create') }}" class="btn btn-sm btn-outline-primary">Tambah Data</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>No Induk Mahasiswa</th>
                                    <th>Dosen Pembimbing</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($mahasiswas as $data)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->nim }}</td>
                                    {{-- Solusi untuk error "Attempt to read property 'nama' on null" --}}
                                    <td>{{ $data->dosen?->nama ?? 'Tidak Ada Dosen' }}</td>
                                    <td>
                                        <form action="{{ route('mahasiswa.destroy', $data->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <a href="{{ route('mahasiswa.show', $data->id) }}" class="btn btn-sm btn-outline-dark show">Show</a>
                                            <a href="{{ route('mahasiswa.edit', $data->id) }}" class="btn btn-sm btn-outline-success edit">Edit</a>
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        Data data belum tersedia.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection