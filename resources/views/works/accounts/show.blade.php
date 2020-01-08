@extends('layouts.app')
@section('content')
@include('components.navs.work')
<h5 class="center">Dados das Contas</h5>
<div class="center row">
    <form class="col s12 view">
        <div class="row">
        @if(isset($account))
            @include('works.accounts.form')
        @else
            <center>Não há conta cadastrada</center>
        @endif
      </div>
        <div class="center row">
        @if (isset($account) && $type == 2)
        <a href="{{url('/works/'.$work_id.'/accounts/' . $account->id . '/edit')}}" class="btn waves-effect waves-light">
            Editar Conta Convênio
            <i class="material-icons right">edit</i>
        </a>
        @endif
        @if (!isset($account) && $type == 2)

        <a href="{{url('works/'.$work_id.'/accounts/create')}}" class="btn waves-effect waves-light">
            Cadastrar Conta Convênio
            <i class="material-icons right">add</i>
        </a>

        @endif
          </div>
    </form>
    <br><br>
    </div>
</div>
@endsection
