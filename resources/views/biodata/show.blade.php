@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detail Biodata</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $biodata->nama }}</p>
            <p><strong>Tanggal Lahir:</strong> {{ $biodata->tgl_lahir }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $biodata->jk }}</p>
            <p><strong>Agama:</strong> {{ $biodata->agama }}</p>
            <p><strong>Alamat:</strong> {{ $biodata->alamat }}</p>
            <p><strong>Tinggi Badan:</strong> {{ $biodata->tb }} cm</p>
            <p><strong>Berat Badan:</strong> {{ $biodata->bb }} kg</p>
            <p><strong>Foto:</strong></p>
            <img src="{{ asset('storage/biodata/' . $biodata->foto) }}" width="200" class="rounded">
        </div>
    </div>

    <a href="{{ route('biodata.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
