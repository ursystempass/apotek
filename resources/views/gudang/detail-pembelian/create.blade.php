@extends('adminlte::page')
@section('title', 'Tambah Detail Pembelian')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Detail Pembelian</h1>
@stop
@section('content')
    <form action="{{ route('detailpembelian.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputPembelian">Pembelian</label>
                                <select class="form-control @error('pembelian_id') is-invalid @enderror"
                                    id="exampleInputPembelian" name="pembelian_id">
                                    <option value="">Pilih Pembelian</option>
                                    @foreach ($pembelians as $pembelian)
                                        <option value="{{ $pembelian->id }}"
                                            @if (old('pembelian_id') == $pembelian->id) selected @endif>{{ $pembelian->nonota_beli }}</option>
                                    @endforeach
                                </select>
                                @error('pembelian_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        <div class="form-group">
                            <label for="exampleInputTglKadaluarsa">Tanggal Kadaluarsa</label>
                            <input type="date" class="form-control @error('tgl_kadaluarsa') is-invalid @enderror"
                                id="exampleInputTglKadaluarsa" name="tgl_kadaluarsa" value="{{ old('tgl_kadaluarsa') }}">
                            @error('tgl_kadaluarsa')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputHargaBeli">Harga Beli</label>
                            <input type="text" class="form-control @error('harga_beli') is-invalid @enderror"
                                id="exampleInputHargaBeli" placeholder="Harga Beli" name="harga_beli"
                                value="{{ old('harga_beli') }}">
                            @error('harga_beli')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputJumlahBeli">Jumlah Beli</label>
                            <input type="text" class="form-control @error('jumlah_beli') is-invalid @enderror"
                                id="exampleInputJumlahBeli" placeholder="Jumlah Beli" name="jumlah_beli"
                                value="{{ old('jumlah_beli') }}">
                            @error('jumlah_beli')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputSubTotalBeli">Sub Total Beli</label>
                            <input type="text" class="form-control @error('sub_total_beli') is-invalid @enderror"
                                id="exampleInputSubTotalBeli" placeholder="Sub Total Beli" name="sub_total_beli"
                                value="{{ old('sub_total_beli') }}">
                            @error('sub_total_beli')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPersenMarginJual">Persen Margin Jual</label>
                            <input type="text" class="form-control @error('persen_magin_jual') is-invalid @enderror"
                                id="exampleInputPersenMarginJual" placeholder="Persen Margin Jual" name="persen_magin_jual"
                                value="{{ old('persen_magin_jual') }}">
                            @error('persen_magin_jual')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputObat">Obat</label>
                            <select class="form-control @error('obat_id') is-invalid @enderror" id="exampleInputObat"
                                name="obat_id">
                                <option value="">Pilih Obat</option>
                                @foreach ($obats as $obat)
                                    <option value="{{ $obat->id }}" @if (old('obat_id') == $obat->id) selected @endif>
                                        {{ $obat->name }}</option>
                                @endforeach
                            </select>
                            @error('obat_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('detailpembelian.index') }}" class="btn btn-default">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
