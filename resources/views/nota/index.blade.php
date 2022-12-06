@extends('transaksi.layout')

@section('content')

<h4 class="mt-5">Nota</h4>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<form action="">
    <input type="text" name="search">
</form>

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>No.</th>
        <th>Nama Customer</th>
        <th>Total Harga</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_customer }}</td>
                <td>{{ $data->nama_customer }}</td>
                <td>{{ $data->total_harga }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop