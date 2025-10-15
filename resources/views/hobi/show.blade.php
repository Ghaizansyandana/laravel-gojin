@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detail Hobi</h2>

        <table class="table">
            <tr>
                <th>Nama Hobi</th>
                <td>{{ $hobi->nama_hobi }}</td>
            </tr>
        </table>

        <a href="{{ route('hobi.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
