<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::all();
        return view('kasir.penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        $users = User::all(); // Adjust this query according to your User model
        return view('kasir.penjualan.create', compact('users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nonota_jual' => 'required|string|max:15',
            'tgl_jual' => 'required|date',
            'total_jual' => 'required|numeric',
            'user_id' => 'required|exists:users,id'
        ]);

        Penjualan::create($request->all());

        return redirect()->route('penjualan.index')
            ->with('success', 'Penjualan created successfully.');
    }

    public function show($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        return view('penjualan.show', compact('penjualan'));
    }

    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $users = User::all();
        return view('kasir.penjualan.edit', compact('penjualan', 'users'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nonota_jual' => 'required|string|max:15',
            'tgl_jual' => 'required|date',
            'total_jual' => 'required|numeric',
            'user_id' => 'required|exists:users,id'
        ]);

        $penjualan = Penjualan::findOrFail($id);
        $penjualan->update($request->all());

        return redirect()->route('penjualan.index')
            ->with('success', 'Penjualan updated successfully');
    }

    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->delete();

        return redirect()->route('penjualan.index')
            ->with('success', 'Penjualan deleted successfully');
    }
}
