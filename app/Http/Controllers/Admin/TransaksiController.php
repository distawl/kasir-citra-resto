<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;


class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all();

        return view('admin.transaksi.index', [
            'transaksis' => $transaksis,
            'page_title' => 'Daftar Transaksi',
        ]);
    }

    public function create()
    {
        return view('admin.transaksi.create', ['page_title' => 'Tambahkan Data Transaksi']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_transaksi' => 'required',
            'total_harga' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        Transaksi::create([
            'kode_transaksi' => $request->kode_transaksi,
            'total_harga' => $request->total_harga,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi berhasil disimpan.');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
