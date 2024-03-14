<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $dist = Distributor::all();
        return view('apoteker.distributor.index', compact('dist'));
    }
    public function create()
    {
        return view('apoteker.distributor.create');
    }
    // public function show()
    // {
    //     $obats = Obat::all();
    //     return view('apoteker.obat.catalog', compact('obats'));
    // }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'name' => 'required|max:50',
            'alamat' => 'required|max:255',
            'notelepon' => 'required|max:15',
        ]);

        // Membuat instance dari model Obat dan menyimpan data yang diterima dari request
        $dist = new Distributor();
        $dist->name = $request->name;
        $dist->alamat = $request->alamat;
        $dist->notelepon = $request->notelepon;
        $dist->save();

        // Redirect ke halaman yang ditentukan dengan pesan sukses
        return redirect()->route('distributor.index')->with('success_message', 'Data distributor berhasil disimpan.');
    }

    public function edit($id)
    {
        // Temukan distributor berdasarkan ID
        $distributor = Distributor::findOrFail($id);

        // Tampilkan halaman edit dengan data distributor yang ingin diubah
        return view('apoteker.distributor.edit', compact('distributor'));
    }

    public function update(Request $request, $id)
    {
        // Temukan distributor berdasarkan ID
        $distributor = Distributor::findOrFail($id);

        // Validasi data yang diterima dari request
        $request->validate([
            'name' => 'required|max:50',
            'alamat' => 'required|max:255',
            'notelepon' => 'required|max:15',
        ]);

        // Update data distributor berdasarkan data yang diterima dari request
        $distributor->name = $request->name;
        $distributor->alamat = $request->alamat;
        $distributor->notelepon = $request->notelepon;
        $distributor->save();

        // Redirect ke halaman yang ditentukan dengan pesan sukses
        return redirect()->route('distributor.index')->with('success_message', 'Data distributor berhasil diperbarui.');
    }

}
