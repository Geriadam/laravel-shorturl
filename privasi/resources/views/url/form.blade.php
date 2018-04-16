@extends('template/t_index')
@section('content')


<div class="container">
	<div class="card">
		<div class="card-header">
			Form Input
		</div>
		{{ HTML::ul($errors->all()) }}
		{{ Form::open(array('url' => '/siswa/siswacreate')) }}
		<div class="card-body">
			<div class="form-group">
				{{ Form::label('nama', 'Nama') }}
				{{ Form::text('nama', Input::old('nama'), ['class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::label('alamat', 'Alamat') }}
				{{ Form::textArea('alamat', Input::old('alamat'), ['class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::label('kelas', 'Kelas') }}
				{{ Form::select('kelas', ['0' => 'Pilih Kelas', '10' => '10', '11' => '11', '12' => '12'], Input::old('kelas'), ['class' => 'form-control']) }}
			</div>
		</div>
		<div class="card-footer">
			{!! Form::submit('Tambah Data', ['class' => 'btn btn-primary']) !!}
		</div>
	</div>
	{!! Form::close() !!}
	@stop
</div>