@extends('layouts.app')
@section('content')
@include('components.navs.work')
<h5 class="center">Cadastrar novo Resumo Finânceiro</h5>
<div class="center row">
    <br>
    <form class="col s12" method="POST"  action="{{ url('/works/'.$work_id.'/transfers') }}">
        {{ csrf_field() }}
        @include('works.transfers.form')
        <input type="hidden" name="work_id" value="{{$work_id}}">
        <div class="row">
          <button class="btn waves-effect waves-light" type="submit">Cadastrar Resumo
              <i class="material-icons right">add</i>
          </button>
        </div>
    </form>
</div>
@endsection
