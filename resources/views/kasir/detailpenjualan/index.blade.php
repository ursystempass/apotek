@extends('adminlte::page')
@section('title', 'List Penjualan')
@section('content_header')
    <h1 class="m-0 text-dark">List Penjualan</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('detailpenjualan.create') }}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-striped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>No. Nota</th>
                                <th>Jumlah Jual</th>
                                <th>Harga Jual</th>
                                <th>Sub Total Jual</th>
                                <th>Obat ID</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($details as $key => $penjualan)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $penjualan->penjualan->no_nota }}</td>
                                    <td>{{ $penjualan->jumlah_jual }}</td>
                                    <td>{{ $penjualan->harga_jual }}</td>
                                    <td>{{ $penjualan->sub_total_jual }}</td>
                                    <td>{{ $penjualan->obat_id }}</td>
                                    <td>
                                        <a href="{{ route('detailpenjualan.edit', $penjualan->id) }}" class="btn btn-primary btn-xs">
                                            Edit
                                        </a>
                                        <a href="{{ route('detailpenjualan.destroy', $penjualan->id) }}"
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
