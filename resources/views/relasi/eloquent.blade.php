@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="col-md-10 mx-auto">
        <h2 class="text-center mb-4">Halo Eloquent 👋</h2>

        @foreach ($mahasiswa as $temp)
            <div class="mb-4 p-4 border rounded-3 shadow-sm bg-white text-center">
                <h3 class="fw-bold mb-2">
                    {{ $temp->nama }}
                    <small class="text-muted">({{ $temp->nim }})</small>
                </h3>

                <p class="text-secondary">Kelas: {{ $temp->kelas->nama_kelas ?? '-' }}</p>

                <h5 class="fw-semibold mt-3">Hobi</h5>
                @if($temp->hobis->count() > 0)
                    <ul class="list-unstyled">
                        @foreach ($temp->hobis as $tampung)
                            <li>• {{ $tampung->nama_hobi }}</li>
                        @endforeach
                    </ul>
                @else
                    <p><em>Belum punya hobi</em></p>
                @endif

                <div class="mt-3 text-start d-inline-block">
                    <ul class="list-unstyled">
                        <li><strong>Nama Wali:</strong> {{ $temp->wali->nama ?? '-' }}</li>
                        <li><strong>Dosen Pembimbing:</strong> {{ $temp->dosen->nama ?? '-' }}</li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
