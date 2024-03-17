<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\DetailPenjualan;

class DetailPenjualanController extends Controller
{
    public function index()
    {
        $details = DetailPenjualan::all();
        return view('kasir.detailpenjualan.index', ['details' => $details]);
    }

    // Menampilkan form untuk membuat detail penjualan baru
    public function create()
    {
        $users = User::all(); // Mengambil semua data pengguna
        return view('kasir.detailpenjualan.create', ['users' => $users]);
    }

    // Menyimpan detail penjualan baru
    public function store(Request $request)
    {
        // Validasi input disini jika diperlukan

        DetailPenjualan::create($request->all());

        return redirect()->route('detailpenjualan.index')
                         ->with('success','Detail penjualan berhasil ditambahkan.');
    }

    // Menampilkan detail penjualan berdasarkan ID
    public function show($id)
    {
        $detail = DetailPenjualan::findOrFail($id);
        return view('detailpenjualan.show', ['detail' => $detail]);
    }

    // Menampilkan form untuk mengedit detail penjualan
    public function edit($id)
    {
        $detail = DetailPenjualan::findOrFail($id);
        return view('detailpenjualan.edit', ['detail' => $detail]);
    }

    // Mengupdate detail penjualan
    public function update(Request $request, $id)
    {
        // Validasi input disini jika diperlukan

        $detail = DetailPenjualan::findOrFail($id);
        $detail->update($request->all());

        return redirect()->route('detailpenjualan.index')
                         ->with('success','Detail penjualan berhasil diperbarui.');
    }

    // Menghapus detail penjualan
    public function destroy($id)
    {
        $detail = DetailPenjualan::findOrFail($id);
        $detail->delete();

        return redirect()->route('detailpenjualan.index')
                         ->with('success','Detail penjualan berhasil dihapus.');
    }
}
