@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Tambah Biodata</h2>
    <form action="{{ route('biodata.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jk" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Agama</label>
            <select name="agama" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="Islam">Islam</option>
                <option value="Hindu">Hindu</option>
                <option value="Katolik">Katolik</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Tinggi Badan (cm)</label>
            <input type="number" name="tb" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Berat Badan (kg)</label>
            <input type="number" name="bb" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('biodata.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
