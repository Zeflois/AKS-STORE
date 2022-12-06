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

        <h5 class="card-title fw-bolder mb-3">Tambah Customer</h5>

		<form method="post" action="{{ route('customer.store') }}">
			@csrf
            <div class="mb-3">
                <label for="id_customer" class="form-label">id_customer</label>
                <input type="text" class="form-control" id="id_customer" name="id_customer">
            </div>
			<div class="mb-3">
                <label for="nama_customer" class="form-label">nama_customer</label>
                <input type="text" class="form-control" id="nama_customer" name="nama_customer">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop