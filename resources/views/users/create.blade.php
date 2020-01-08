@extends('layouts.app')
@section('content')
<h5 class="center">Cadastro de Usuario</h5>
<div class="registerBox">
    <form method="post"  onsubmit="unMask()" action="{{ url('/users') }}">
        {{ csrf_field() }}
        @include('users.form')
        <br>
        <button class="btn waves-effect waves-light" type="submit" name="action">Adicionar Usuário
            <i class="material-icons right">add</i>
        </button>
    </form>
</div>
<br><br><br>
@endsection
