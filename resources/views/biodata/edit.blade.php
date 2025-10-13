@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Biodata</h2>
    <form action="{{ route('biodata.update', $biodata->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $biodata->nama }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" value="{{ $biodata->tgl_lahir }}" required>
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jk" class="form-control" required>
                <option value="Laki-laki" {{ $biodata->jk == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $biodata->jk == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Agama</label>
            <select name="agama" class="form-control" required>
                @foreach (['Islam', 'Hindu', 'Katolik', 'Buddha', 'Konghucu'] as $agama)
                    <option value="{{ $agama }}" {{ $biodata->agama == $agama ? 'selected' : '' }}>
                        {{ $agama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required>{{ $biodata->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label>Tinggi Badan (cm)</label>
            <input type="number" name="tb" class="form-control" value="{{ $biodata->tb }}" required>
        </div>

        <div class="mb-3">
            <label>Berat Badan (kg)</label>
            <input type="number" name="bb" class="form-control" value="{{ $biodata->bb }}" required>
        </div>

        <div class="mb-3">
            <label>Foto</label><br>
            @if($biodata->foto)
                <img src="{{ asset('storage/biodata/' . $biodata->foto) }}" width="100" class="mb-2">
            @endif
            <input type="file" name="foto" class="form-control">
            <small>Kosongkan jika tidak ingin ganti foto</small>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('biodata.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
