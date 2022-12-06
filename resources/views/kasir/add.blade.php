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

        <h5 class="card-title fw-bolder mb-3">Tambah Kasir</h5>

		<form method="post" action="{{ route('kasir.store') }}">
			@csrf
            <div class="mb-3">
                <label for="id_kasir" class="form-label">id_kasir</label>
                <input type="text" class="form-control" id="id_kasir" name="id_kasir">
            </div>
			<div class="mb-3">
                <label for="nama_kasir" class="form-label">nama_kasir</label>
                <input type="text" class="form-control" id="nama_kasir" name="nama_kasir">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop