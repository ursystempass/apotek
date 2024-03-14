@extends('adminlte::page')
@section('title', 'Edit Pembelian')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Pembelian</h1>
@stop
@section('content')
    <form action="{{ route('pembelian.update', $pembelian->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputNonotaBeli">No Nota Beli</label>
                            <input type="text" class="form-control @error('nonota_beli') is-invalid @enderror"
                                id="exampleInputNonotaBeli" placeholder="No Nota Beli" name="nonota_beli"
                                value="{{ old('nonota_beli', $pembelian->nonota_beli) }}">
                            @error('nonota_beli')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputTanggalBeli">Tanggal Beli</label>
                            <input type="date" class="form-control @error('tgl_beli') is-invalid @enderror"
                                id="exampleInputTanggalBeli" name="tgl_beli"
                                value="{{ old('tgl_beli', $pembelian->tgl_beli ? \Carbon\Carbon::parse($pembelian->tgl_beli)->format('Y-m-d') : '') }}">
                            @error('tgl_beli')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputTotalBeli">Total Beli</label>
                            <input type="text" class="form-control @error('total_beli') is-invalid @enderror"
                                id="exampleInputTotalBeli" placeholder="Total Beli" name="total_beli"
                                value="{{ old('total_beli', $pembelian->total_beli) }}">
                            @error('total_beli')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputDistributor">Distributor</label>
                            <select class="form-control @error('distributor_id') is-invalid @enderror"
                                id="exampleInputDistributor" name="distributor_id">
                                <option value="">Pilih Distributor</option>
                                @foreach ($distributors as $distributor)
                                    <option value="{{ $distributor->id }}"
                                        @if (old('distributor_id', $pembelian->distributor_id) == $distributor->id) selected @endif>{{ $distributor->name }}</option>
                                @endforeach
                            </select>
                            @error('distributor_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputUser">User</label>
                            <select class="form-control @error('user_id') is-invalid @enderror" id="exampleInputUser"
                                name="user_id">
                                <option value="">Pilih User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        @if (old('user_id', $pembelian->user_id) == $user->id) selected @endif>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('pembelian.index') }}" class="btn btn-default">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
