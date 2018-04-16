@extends('template/t_index')
@section('content')



<br>
<div class="container">
	<a href="create" class="btn btn-primary">Tambah</a>
		@if(Session::has('message'))
			<div>
				<span class="badge badge-success">{{ Session::get('message') }}</span>
			</div>
		@endif
		<div class="card"><br>
			<div class="table-responsive">
				<table class="table table-striped">
					<tr>
						<th>No</th>
						<th>Url Asli</th>
						<th>Url Pendek</th>
						<th>Klik</th>
						<th>Action</th>
					</tr>
					<?php $no = 1; ?>
					@foreach($model as $data)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $data->url_asli }}</td>
						<td><a href="{{ url('/url/'.$data->url_hash) }}" target="_blank">{{ $data->url_palsu }}</a></td>
						<td>{{ $data->url_click }}</td>
						<td><a href="delete/{{ $data->id_url }}">Hapus </a></td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
</div>
@stop