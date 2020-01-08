@extends('layouts.app') @section('content')
<h5 class="center">Cadastrar nova obra</h5>
<div class="center row">
	<h6>Dados da obra</h6>
	<br>
	<form class="col s12" method="post"  onsubmit="unMask()" action="{{ url('/works/') }}">
		{{ csrf_field() }} @include('works.form')
		<button class="btn waves-effect waves-light" type="submit">Cadastrar Obra
			<i class="material-icons right">add</i>
		</button>
	</form>
</div>
@endsection
