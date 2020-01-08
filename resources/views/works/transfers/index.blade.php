@extends('layouts.app')
@section('content')
@include('components.navs.work')
<h5 class="center">Resumo Finânceiro</h5>
@if($transfers->isNotEmpty())
<table class="striped centered highlight obras">
    <thead>
        <tr>
            <th>Parcela</th>
            <th>Valor Recebido</th>
            <th>Status</th>
            <th>Data de Inclusão</th>
            <th>Nº OB</th>
            <th>Data OB</th>
            <th>Vlr Rec.</th>
            <th>Vlr Pago</th>
            <th>Ações</th>
        </tr>

    </thead>

    <tbody>
            @foreach ($transfers as $transfer)
            <tr>
                <td >{{$transfer->parcel}}</td>
                <td >{{$transfer->amount_received}}</td>
                <td >{{$transfer->status}}</td>
                <td >{{$transfer->inclusion_date}}</td>
                <td >{{$transfer->ob_number}}</td>
                <td >{{$transfer->ob_date}}</td>
                <td >{{$transfer->value_rec}}</td>
                <td >{{$transfer->value_paid}}</td>



                @if($type == 2)
                    <td>
                        <a href="{{url('/works/'.$work_id.'/transfers/'.$transfer->id.'/edit') }}" class="tooltipped left" data-tooltip="Editar"><i class="material-icons">edit</i></a>

                        <form  action="{{ url('/works/'.$work_id.'/transfers/'.$transfer->id) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}

                            <button type="submit" data-tooltip="Excluir" class="tooltipped linkButton">
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
    <center>Sem histórico de Transferencias no cadastro.</center>
@endif
@if($type == 2)
<br>
<br>
    <a href="{{url('works/'.$work_id.'/transfers/create')}}" class="btn waves-effect waves-light">
        Cadastrar Transferencia
        <i class="material-icons right">add</i>
    </a>
@endif

@endsection
