@extends('adminlte::page')
@section('title', 'Tambah Obat')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Obat</h1>
@stop
@section('content')
    <form action="{{ route('distributor.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama Obat" name="name" value="{{ old('name') }}">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAlamat">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="exampleInputAlamat" placeholder="alamat" name="alamat" value="{{ old('alamat') }}">
                            @error('alamat') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNotelepon">No Telepon</label>
                            <input type="text" class="form-control @error('notelepon') is-invalid @enderror" id="exampleInputNotelepon" placeholder="notelepon" name="notelepon" value="{{ old('notelepon') }}">
                            @error('notelepon') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('distributor.index') }}" class="btn btn-default">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
