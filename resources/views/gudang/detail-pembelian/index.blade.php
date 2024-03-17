@extends('adminlte::page')
@section('title', 'List Pembelian')
@section('content_header')
    <h1 class="m-0 text-dark">List Pembelian</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('detailpembelian.create') }}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-striped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nota</th>
                                <th>Tanggal Kadaluarsa</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Marginl</th>
                                <th>Obat</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detailPembelians as $key => $detailPembelian)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $detailPembelian->pembelian->nonota_beli }}</td>
                                    <td>{{ $detailPembelian->tgl_kadaluarsa }}</td>
                                    <td>{{ $detailPembelian->harga_beli }}</td>
                                    <td>{{ $detailPembelian->jumlah_beli }}</td>
                                    <td>{{ $detailPembelian->sub_total_beli }}</td>
                                    <td>{{ $detailPembelian->persen_magin_jual }}</td>
                                    <td>{{ $detailPembelian->obat->name }}</td>
                                    <td>
                                        <a href="{{ route('detailpembelian.edit', $detailPembelian->id) }}">Edit</a>
                                        <a href="{{ route('detailpembelian.destroy', $detailPembelian->id) }}"
                                            onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
