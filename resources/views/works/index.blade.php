@extends('layouts.app')

@section('content')

<h5 class="center title" >Obras Cadastradas</h5>
@if($works->isNotEmpty())
<table class="striped highlight obras">
    <thead>
        <tr>
            <th>Obra</th>
            <th>Contrato</th>
            <th>Ano</th>
            <th>Situação</th>
            @if (Auth::user()->privilege == 2 )
            <th class="centered ico">Editar</th>
            @endif
        </tr>

    </thead>

    <tbody>

        @foreach ($works as $work)

        <tr onclick="location.href='{{url('/works/' . $work->id)}}'">

            <td >{{$work->name}}</td>
            <td >{{$work->contract}}</td>
            <td >{{$work->year}}</td>
            <td>{{$work->status}}</td>
            @if (Auth::user()->privilege >= 2 )
            <td>
              <a href="{{url('/works/' . $work->id . '/edit')}}" class="tooltipped" data-tooltip="Editar Obra" ><i class="material-icons">edit</i></a>
            </td>
            @endif
          @endforeach

    </tbody>
</table>
@else
    <center>Não há obras a serem listadas</center>
@endif
@endsection