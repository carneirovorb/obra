@extends('layouts.app')
@section('content')
@include('components.navs.work')
<h5 class="center">Editar Execução</h5>
<div class="center row">
    <br>
    <form class="col s12" method="POST"  action="{{ url('/works/'.$work_id.'/financial/'.$financial->id ) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        @include('works.financial.form')
        <button class="btn waves-effect waves-light" type="submit">Atualizar
            <i class="material-icons right">add</i>
        </button>
        </div>
    </form>
</div>
@endsection
