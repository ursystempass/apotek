<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all();
        return view('apoteker.obat.index', compact('obats'));
    }
    public function create()
    {
        return view('apoteker.obat.create');
    }
    public function show()
    {
        $obats = Obat::all();
        return view('apoteker.obat.catalog', compact('obats'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'kode_obat' => 'required|unique:obats,kode_obat|max:30',
            'name' => 'required|max:100',
            'merk' => 'required|max:50',
            'jenis' => 'required|max:50',
            'satuan' => 'required|max:30',
            'golongan' => 'required|max:255',
            'kemasan' => 'required|max:255',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        // Membuat instance dari model Obat dan menyimpan data yang diterima dari request
        $obat = new Obat();
        $obat->kode_obat = $request->kode_obat;
        $obat->name = $request->name;
        $obat->merk = $request->merk;
        $obat->jenis = $request->jenis;
        $obat->satuan = $request->satuan;
        $obat->golongan = $request->golongan;
        $obat->kemasan = $request->kemasan;
        $obat->harga_jual = $request->harga_jual;
        $obat->stok = $request->stok;
        $obat->save();

        // Redirect ke halaman yang ditentukan dengan pesan sukses
        return redirect()->route('obat.index')->with('success_message', 'Data obat berhasil disimpan.');
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('apoteker.obat.edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'merk' => 'required|max:50',
            'jenis' => 'required|max:50',
            'satuan' => 'required|max:30',
            'golongan' => 'required|max:255',
            'kemasan' => 'required|max:255',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        // Mengambil data obat yang akan diedit berdasarkan ID
        $obat = Obat::findOrFail($id);

        // Mengupdate data obat dengan data baru dari request
        $obat->name = $request->name;
        $obat->merk = $request->merk;
        $obat->jenis = $request->jenis;
        $obat->satuan = $request->satuan;
        $obat->golongan = $request->golongan;
        $obat->kemasan = $request->kemasan;
        $obat->harga_jual = $request->harga_jual;
        $obat->stok = $request->stok;
        $obat->save();

        // Redirect ke halaman yang ditentukan dengan pesan sukses
        return redirect()->route('obat.index')->with('success_message', 'Data obat berhasil diperbarui.');
    }
}
