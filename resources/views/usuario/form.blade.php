@extends('layout')

@section('title','Crear')

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-header text-center">
				Crear Usuario
			</div>
			<form method="POST" action="{{ route('usuario.store') }}">
				
				@csrf

				<div class="card-body">
					<div class="row">
						<div class="form-group col-12 col-md-6">
							<label for="nombre">Nombre del usuario</label>
							<input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre">
							@error("nombre")
								<small id="nombreError" class="form-text text-danger">{{$message}}.</small>
							@enderror
						</div>
						<div class="form-group col-12 col-md-6">
							<label for="email">Correo Electronico</label>
							<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp">
							@error("email")
								<small id="nombreError" class="form-text text-danger">{{$message}}.</small>
							@enderror
						</div>
					</div>
				</div>
				<div class="card-footer text-muted  text-center">
					<button class="btn btn-outline-success" type="submit">Guardar</button>
				</div>
				
			</form>
		</div>
	</div>
@endsection