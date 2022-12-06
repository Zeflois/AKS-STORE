@extends('transaksi.layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Ubah Data Transaksi</h5>

		<form method="POST" action="{{ route('transaksi.update', $data->id_transaksi) }}">
			@csrf
            @method("PUT")
            <div class="mb-3">
                <label for="id_transaksi" class="form-label">ID Transaksi</label>
                <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" value="{{ $data->id_transaksi }}">
            </div>
			<div class="mb-3">
                <label for="total_harga" class="form-label">Total Harga</label>
                <input type="text" class="form-control" id="total_harga" name="total_harga" value="{{ $data->total_harga }}">
            </div>
            <div class="mb-3">
                <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
                <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" value="{{ $data->tanggal_transaksi }}">
            </div>
            <div class="mb-3">
                <label for="id_aksesoris" class="form-label">ID Aksesoris</label>
                <input type="text" class="form-control" id="id_aksesoris" name="id_aksesoris" value="{{ $data->id_aksesoris }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop