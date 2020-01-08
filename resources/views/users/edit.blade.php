@extends('layouts.app')
@section('content')

<style>
	.backBox{
		display: block;
	}
</style>

<h5 class="center">Editar Usuário {{$user->name}}</h5>

<div class="registerBox">
	<form method="post"  action="{{ url('/users/' .$user->id) }}">
		{{ csrf_field() }}
		{{method_field('PUT')}}
		@include('users.form')
		<button class="btn waves-effect waves-light" type="submit" name="action">Salvar edições
		</button>
	</form>


	<form  action="{{ url('/users/' . $user->id) }}" onsubmit="return confirm('Tem certeza que deseja deletar este usuário? Essa operação é irreversível.')" method="POST">
	{{ method_field('DELETE') }}
	{{ csrf_field() }}
	<button class="btn waves-effect waves-light right red" type="submit" name="action">Deletar usuário
	</button>
</form>


<br>
<br>

</div>
@endsection
