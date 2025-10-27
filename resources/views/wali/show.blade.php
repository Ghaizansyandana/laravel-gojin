@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>Detail Data Wali</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">ID</th>
                                <td>{{ $wali->id }}</td>
                            </tr>
                            <tr>
                                <th>Nama Wali</th>
                                <td>{{ $wali->nama_wali }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $wali->alamat }}</td>
                            </tr>
                            <tr>
                                <th>No. Telepon</th>
                                <td>{{ $wali->no_telepon }}</td>
                            </tr>
                            <tr>
                                <th>Dibuat Pada</th>
                                <td>{{ $wali->created_at->format('d M Y, H:i:s') }}</td>
                            </tr>
                            <tr>
                                <th>Diupdate Pada</th>
                                <td>{{ $wali->updated_at->format('d M Y, H:i:s') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <a href="{{ route('wali.index') }}" class="btn btn-secondary">Kembali ke Daftar Wali</a>
                    <a href="{{ route('wali.edit', $wali->id) }}" class="btn btn-warning">Edit Data Ini</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection