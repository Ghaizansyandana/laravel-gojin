@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Daftar Pembayaran</h2>
    <a href="{{ route('pembayaran.create') }}" class="btn btn-primary mb-3">+ Tambah Pembayaran</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>Metode</th>
                <th>Jumlah Bayar</th>
                <th>Kembalian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayarans as $pembayaran)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pembayaran->transaksi->kode_transaksi ?? '-' }}</td>
                    <td>{{ $pembayaran->metode }}</td>
                    <td>Rp {{ number_format($pembayaran->jumlah_bayar, 2, ',', '.') }}</td>
                    <td>Rp {{ number_format($pembayaran->kembalian, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
