@extends('layouts.app')
@section('content')
@include('components.navs.work')
<h5 class="center">Editar novo Resumo Finânceiro</h5>
<div class="center row">
    <h6>Dados do Resumo</h6>
    <br>
    <form class="col s12" method="post"  action="{{ url('/works/' . $work_id. '/transfers/'.$transfer->id) }}">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        @include('works.transfers.form')
        <button class="btn waves-effect waves-light" type="submit">Editar Resumo
            <i class="material-icons right">add</i>
        </button>
        </div>
    </form>
</div>

@endsection
