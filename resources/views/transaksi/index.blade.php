@extends('transaksi.layout')

@section('content')
<h4 class="mt-5">Data Transaksi</h4>

<a href="{{ route('transaksi.add') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>No (ID Transaksi)</th>
        <th>Total Harga</th>
        <th>Tanggal Transaksi</th>
        <th>ID Aksesoris</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_transaksi }}</td>
                <td>{{ $data->total_harga }}</td>
                <td>{{ $data->tanggal_transaksi }}</td>
                <td>{{ $data->id_aksesoris }}</td>
                <td>
                    <a href="{{ route('transaksi.edit', $data->id_transaksi) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>
                    <form class = "mt-1 form-inline" method="POST" action="{{ route('transaksi.soft', $data->id_transaksi) }}">
                        @csrf
                            <button onclick="return confirm('{{ __('Are you sure you want to destroy?') }}')" type="submit" class="btn btn-warning">Hapus Bentar</button>
                    </form>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_transaksi }}">
                        Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_transaksi }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('transaksi.destroy', $data->id_transaksi) }}">
                                    @csrf
                                    @method('delete')
                                    <div class="modal-body">
                                        Apakah anda ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop

