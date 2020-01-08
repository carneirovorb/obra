@extends('layouts.app')
@section('content')
@include('components.navs.work')
<h5 class="center">Editar Conta do Convênio</h5>

    <br>
    <form class="col s12" method="POST"  action="{{ url('/works/'.$work_id.'/accounts/'.$account->id ) }}">
      <div class="center row">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        @include('works.accounts.form')
      </div>
        <div class="center row">
        <button class="btn waves-effect waves-light" type="submit">Atualizar
            <i class="material-icons right">add</i>
        </button>
        </div>
    </form>
</div>
@endsection
