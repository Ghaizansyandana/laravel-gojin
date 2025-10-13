@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold">Dashboard</h2>
            <p class="text-muted">Selamat datang di panel admin Laravel kamu 👋</p>
        </div>
    </div>

    <!-- Statistik singkat -->
    <div class="row text-center">
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Produk</h5>
                    <h2 class="fw-bold text-primary">{{ $produk ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h5 class="card-title">Jumlah User</h5>
                    <h2 class="fw-bold text-success">{{ $user ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h5 class="card-title">Total Transaksi</h5>
                    <h2 class="fw-bold text-warning">{{ $transaksi ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h5 class="card-title">Pengunjung</h5>
                    <h2 class="fw-bold text-danger">{{ $pengunjung ?? 0 }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel ringkasan data -->
    <div class="card shadow-sm border-0 mt-4 rounded-4">
        <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">Data Terbaru</h5>
            <a href="{{ route('produk.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($produkList) && count($produkList) > 0)
                        @foreach ($produkList as $i => $p)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                            <td>{{ $p->kategori }}</td>
                            <td>{{ $p->created_at->format('d M Y') }}</td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
