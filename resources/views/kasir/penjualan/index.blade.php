@extends('adminlte::page')
@section('title', 'List penjualan')
@section('content_header')
    <h1 class="m-0 text-dark">List Penjualan</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('penjualan.create') }}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-striped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>No. Nota Jual</th>
                                <th>Tanggal Jual</th>
                                <th>Total Jual</th>
                                <th>User ID</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penjualans as $key => $penjualan)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $penjualan->nonota_jual }}</td>
                                    <td>{{ $penjualan->tgl_jual }}</td>
                                    <td>{{ $penjualan->total_jual }}</td>
                                    <td>{{ $penjualan->user_id }}</td>
                                    <td>
                                        <a href="{{ route('penjualan.edit', $penjualan->id) }}" class="btn btn-primary btn-xs">
                                            Edit
                                        </a>
                                        <a href="{{ route('penjualan.destroy', $penjualan->id) }}"
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
