@extends('layouts.app')
@section('content')
@include('components.navs.work')

<h5 class="center">Cadastrar nova Execução</h5>
<div class="center row">
    <br>
    <form class="col s12" method="POST"  action="{{ url('/works/'.$work_id.'/financial') }}">
        {{ csrf_field() }}
        <div class="center row">
        @include('works.financial.form')
            </div>
        <input type="hidden" name="work_id" value="{{$work_id}}">
        <div class="center row">
        <button class="btn waves-effect waves-light" type="submit">Cadastrar
            <i class="material-icons right">add</i>
        </button>
    </div>
    </form>
    </div>
</div>
@endsection
