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

        <h5 class="card-title fw-bolder mb-3">Ubah Data Kasir</h5>

		<form method="post" action="{{ route('kasir.update', $data->id_kasir) }}">
			@csrf
            @method("PUT")
            <div class="mb-3">
                <label for="id_kasir" class="form-label">ID Kasir</label>
                <input type="text" class="form-control" id="id_kasir" name="id_kasir" value="{{ $data->id_kasir }}">
            </div>
			<div class="mb-3">
                <label for="nama_kasir" class="form-label">Nama Kasir</label>
                <input type="text" class="form-control" id="nama_kasir" name="nama_kasir" value="{{ $data->nama_kasir }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop