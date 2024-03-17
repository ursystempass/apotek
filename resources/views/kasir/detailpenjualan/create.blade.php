@extends('adminlte::page')
@section('title', 'Tambah Penjualan')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Penjualan</h1>
@stop
@section('content')
    <form action="{{ route('penjualan.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputNonotaJual">No Nota Jual</label>
                            <input type="text" class="form-control @error('nonota_jual') is-invalid @enderror"
                                id="exampleInputNonotaJual" placeholder="No Nota Jual" name="nonota_jual"
                                value="{{ old('nonota_jual') }}">
                            @error('nonota_jual')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputTanggalJual">Tanggal Jual</label>
                            <input type="datetime-local" class="form-control @error('tgl_jual') is-invalid @enderror"
                                id="exampleInputTanggalJual" name="tgl_jual" value="{{ old('tgl_jual') }}">
                            @error('tgl_jual')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputTotalJual">Total Jual</label>
                            <input type="text" class="form-control @error('total_jual') is-invalid @enderror"
                                id="exampleInputTotalJual" placeholder="Total Jual" name="total_jual"
                                value="{{ old('total_jual') }}">
                            @error('total_jual')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUser">User</label>
                            <select class="form-control @error('user_id') is-invalid @enderror" id="exampleInputUser"
                                name="user_id">
                                <option value="">Pilih User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('penjualan.index') }}" class="btn btn-default">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
