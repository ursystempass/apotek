<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use App\Models\DetailPembelian;

class DetailPembelianController extends Controller
{
    public function index()
    {
        $detailPembelians = DetailPembelian::all();
        return view('gudang.detail-pembelian.index', compact('detailPembelians'));
    }

    public function create()
    {
        $pembelians = Pembelian::all();
        $obats = Obat::all();
        return view('gudang.detail-pembelian.create', compact('pembelians', 'obats'));
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'pembelian_id' => 'required|exists:pembelians,id',
            'tgl_kadaluarsa' => 'required|date',
            'harga_beli' => 'required|numeric',
            'jumlah_beli' => 'required|integer',
            'sub_total_beli' => 'required|numeric',
            'persen_magin_jual' => 'required|integer',
            'obat_id' => 'required|exists:obats,id',
        ]);

        // Simpan data detail pembelian ke database
        DetailPembelian::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
// destroy method
        return redirect()->route('detailpembelian.index')->with('success', 'Detail Pembelian berhasil dihapus.');
    }

    public function show(DetailPembelian $detailPembelian)
    {
        // Kode untuk menampilkan detail pembelian
    }

    public function edit(DetailPembelian $detailpembelian)
    {
        // Retrieve $detailPembelian from the database using route model binding
        $pembelians = Pembelian::all();
        $obats = Obat::all();
        return view('gudang.detail-pembelian.edit', compact('detailpembelian', 'pembelians', 'obats'));
    }

    public function update(Request $request, DetailPembelian $detailpembelian)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'pembelian_id' => 'required|exists:pembelians,id',
            'tgl_kadaluarsa' => 'required|date',
            'harga_beli' => 'required|numeric',
            'jumlah_beli' => 'required|integer',
            'sub_total_beli' => 'required|numeric',
            'persen_magin_jual' => 'required|integer',
            'obat_id' => 'required|exists:obats,id',
        ]);

        // Perbarui data detail pembelian ke database
        $detailpembelian->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('detailpembelian.index')->with('success', 'Detail Pembelian berhasil diperbarui.');
    }

    public function destroy(DetailPembelian $detailPembelian)
    {
        // Hapus detail pembelian dari database
        $detailPembelian->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('detail_pembelian.index')->with('success', 'Detail Pembelian berhasil dihapus.');
    }
}
