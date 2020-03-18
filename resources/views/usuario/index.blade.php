@extends('layout')

@section('title','Index')

@section('content')
    <div class="container">
        <div class="card">
			<div class="card-header text-center">
				Usuarios
			</div>
			<div class="card-body">
				<table class="table table-bordered table-hover">
					<thead class="thead-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nombre</th>
							<th scope="col">Email</th>
						</tr>
					</thead>
					<tbody id="tbody">
						@forelse ($usuarios as $usuario)
							<tr>
								<th scope="row">{{$usuario->id}}</th>
								<td>{{$usuario->nombre}}</td>
								<td>{{$usuario->email}}</td>
							</tr>
						@empty
							<a href="{{ route('usuario.create') }}" class="btn btn-outline-secondary">Crear un usuario</a>
						@endforelse
					</tbody>
				</table>
			</div>
			<div class="card-footer text-muted  text-center">
				<a href="{{ route('usuario.create') }}" class="btn btn-outline-secondary">Crear un usuario</a>
			</div>
		</div>
    </div>
@endsection
@push('scripts')
	<script type="text/javascript">
		Echo.channel('usuario').listen('NewUsuario',(e)=>{
			let usuario = e.usuario;
			let html = `
				<tr>
					<th scope="row">
						${usuario.id}
					</th>
					<td>
						${usuario.nombre}
					</td>
					<td>
						${usuario.email}
					</td>
				</tr>
			`;
			$("#tbody").append(html);
		})
	</script>
@endpush