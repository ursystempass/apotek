<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pembelian;
use App\Models\Distributor;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        $user = User::all();
        $pembelians = Pembelian::all();
        return view('gudang.pembelian.index', compact('pembelians','user'));
    }

    public function create()
    {
        $distributors = Distributor::all();
        $users = User::all();

        return view('gudang.pembelian.create', compact('distributors', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nonota_beli' => 'required|string|max:15',
            'tgl_beli' => 'required|date',
            'total_beli' => 'required|numeric',
            'distributor_id' => 'required|exists:distributors,id',
            'user_id' => 'required|exists:users,id',
        ]);

        Pembelian::create($request->all());

        return redirect()->route('pembelian.index')
            ->with('success', 'Pembelian berhasil ditambahkan.');
    }

    public function edit(Pembelian $pembelian)
    {
        // Ambil data distributor dan user untuk dropdown
        $distributors = Distributor::all();
        $users = User::all();

        return view('gudang.pembelian.edit', compact('pembelian', 'distributors', 'users'));
    }

    public function update(Request $request, Pembelian $pembelian)
    {
        $request->validate([
            'nonota_beli' => 'required|string|max:15',
            'tgl_beli' => 'required|date',
            'total_beli' => 'required|numeric',
            'distributor_id' => 'required|exists:distributors,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $pembelian->update($request->all());

        return redirect()->route('pembelian.index')
            ->with('success', 'Pembelian berhasil diperbarui.');
    }

    public function destroy(Pembelian $pembelian)
    {
        $pembelian->delete();

        return redirect()->route('pembelian.index')
            ->with('success', 'Pembelian berhasil dihapus.');
    }
}
