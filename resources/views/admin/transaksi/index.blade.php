@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <a href="{{ route('admin.transaksi.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>Total Harga</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaksi->kode_transaksi }}</td>
                    <td>{{ $transaksi->total_harga }}</td>
                    <td>{{ $transaksi->tanggal }}</td>
                    <td>
                        <form action="{{ route('admin.transaksi.destroy', $transaksi->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')"><i
                                    class="fas fa-fw fa-trash text-danger"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
