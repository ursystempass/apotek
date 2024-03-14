@extends('adminlte::page')
@section('title', 'Edit Distributor')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Distributor</h1>
@stop
@section('content')
    <form action="{{ route('distributor.update', $distributor->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama distributor" name="name" value="{{ $distributor->name }}">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAlamat">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="exampleInputAlamat" placeholder="Alamat distributor" name="alamat">{{ $distributor->alamat }}</textarea>
                            @error('alamat') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNoTelepon">Nomor Telepon</label>
                            <input type="text" class="form-control @error('notelepon') is-invalid @enderror" id="exampleInputNoTelepon" placeholder="Nomor Telepon distributor" name="notelepon" value="{{ $distributor->notelepon }}">
                            @error('notelepon') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
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
