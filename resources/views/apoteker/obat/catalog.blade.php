@extends('adminlte::page')
@section('title', 'Catalog Obat')
@section('content_header')
    <h1 class="m-0 text-dark">Catalog Obat</h1>
@stop
@section('content')
    <div class="row">
        @foreach ($obats as $obat)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $obat->name }}</h5>
                        <p class="card-text"><strong>Kode Obat:</strong> {{ $obat->kode_obat }}</p>
                        <p class="card-text"><strong>Merk:</strong> {{ $obat->merk }}</p>
                        <p class="card-text"><strong>Jenis:</strong> {{ $obat->jenis }}</p>
                        <p class="card-text"><strong>Satuan:</strong> {{ $obat->satuan }}</p>
                        <p class="card-text"><strong>Golongan:</strong> {{ $obat->golongan }}</p>
                        <p class="card-text"><strong>Kemasan:</strong> {{ $obat->kemasan }}</p>
                        <p class="card-text"><strong>Harga Jual:</strong> {{ $obat->harga_jual }}</p>
                        <p class="card-text"><strong>Stok:</strong> {{ $obat->stok }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('obat.edit', $obat) }}" class="btn btn-primary btn-sm">
                            Edit
                        </a>
                        <a href="{{ route('obat.destroy', $obat) }}" onclick="notificationBeforeDelete(event, this)"
                            class="btn btn-danger btn-sm">
                            Delete
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
