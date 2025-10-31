@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Detail Pelanggan</h2>

    <div class="card">
        <div class="card-body">
            <h4>{{ $pelanggan->nama }}</h4>
            <p><strong>Nomer hp:</strong> {{ $pelanggan->no_hp }}</p>
            <p><strong>Alamat:</strong> {{ $pelanggan->alamat }}</p>
        </div>
    </div>

    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
