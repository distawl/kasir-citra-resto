@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.transaksi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode_transaksi">Kode Transaksi</label>
            <input type="text" name="kode_transaksi" id="kode_transaksi" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="total_harga">Total Harga</label>
            <input type="number" name="total_harga" id="total_harga" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
