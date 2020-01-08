@extends('layouts.app')
@section('content')
@include('components.navs.work')
<h5 class="center">Resumo Finânceiro</h5>
<div class="center row">
    <h6>Dados do Resumo</h6>
    <br>
    <form class="col s12">
        @include('works.transfers.form')
    </form>
    <a href="{{url('/works/'.$work_id.'/transfers/' . $transfer->id . '/edit')}}" class="btn waves-effect waves-light">
        Editar Resumo Finânceiro
        <i class="material-icons right">add</i>
    </a>
</div>
@endsection
