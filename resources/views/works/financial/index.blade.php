@extends('layouts.app')
@section('content')
@include('components.navs.work')
<h5 class="center">Execução Financeira</h5>
@if($financials->isNotEmpty())
<table class="striped highlight obras">
    <thead>
        <tr>
            <th></th>
            <th>Nº da NF</th>
            <th>Emissão</th>
            <th>Valor Total</th>
            <th>Ação</th>
        </tr>

    </thead>

    <tbody>
            @foreach ($financials as $financial)
            <tr onclick="location.href='{{url('/works/'.$work_id.'/financial/'.$financial->id) }}'">
                <td >Parcela {{$financial->id}}</td>
                <td >{{$financial->n_nf}}</td>
                <td >{{$financial->emission}}</td>
                <td >{{$financial->total_value}}</td>


                @if($type == 2)
                    <td>
                        <a href="{{url('/works/'.$work_id.'/financial/'.$financial->id.'/edit') }}" class="tooltipped left" data-tooltip="Editar"><i class="material-icons">edit</i></a>

                        <form  action="{{ url('/works/'.$work_id.'/financial/'.$financial->id) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" data-tooltip="Deletar" class="linkButton tooltipped">
                                    <i class="material-icons">delete</i>
                            </button>
                        </form>
                    </td>
                @endif
            </tr>
            @endforeach
    </tbody>
</table>
@else
    <center>Ainda não há resumos de transferências cadastrados</center>
@endif
@if($type == 2)
<br>
<br>
    <a href="{{url('works/'.$work_id.'/financial/create')}}" class="btn waves-effect waves-light">
        Cadastrar Execução
        <i class="material-icons right">add</i>
    </a>
@endif

@endsection
