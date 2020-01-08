@extends('layouts.app')
@section('content')
@include('components.navs.work')
<div class="center row">
    <h6>Dados da obra</h6>
    <br>
    <form class="col s12" method="post"  action="{{ url('/works/' . $work->id) }}">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        @include('works.form')
        <div class="row">
        <button class="btn waves-effect waves-light right" type="submit">Atualizar Obra
            <i class="material-icons right">add</i>
        </button>
      </div>
    </form>
</div>
<div class="center row">
<form  action="{{ url('/works/'.$work->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar esta obra? Essa operação é irreversível.')">
  {{ method_field('DELETE') }}
  {{ csrf_field() }}
  <button class="btn waves-effect waves-light left red lighten-1" type="submit">Deletar Obra
      <i class="material-icons right">delete</i>
  </button>
</form>
</div>
@endsection
