@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Tambah Transaksi</h1>

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="pelanggan_id" class="form-label">Pelanggan</label>
            <select name="pelanggan_id" id="pelanggan_id" class="form-select" required>
                <option value="">-- Pilih Pelanggan --</option>
                @foreach($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
            <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" class="form-control" value="{{ date('Y-m-d') }}" required>
        </div>


        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
