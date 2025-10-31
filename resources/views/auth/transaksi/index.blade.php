@extends('layouts.app')

@section('title', 'Daftar Transaksi')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Daftar Transaksi</h4>
    </div>
    <div class="card-body">
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Transaksi</th>
                    <th>Tanggal</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksi->id }}</td>
                    <td>{{ $transaksi->kode_transaksi }}</td>
                    <td>{{ $transaksi->tanggal_transaksi ?? 'N/A' }}</td>
                    <td>Rp {{ number_format($transaksi->total_harga ?? 0, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('transaksi.show', $transaksi->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
