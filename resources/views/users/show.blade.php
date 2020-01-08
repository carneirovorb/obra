@extends('layouts.app')
@section('content')
<table class="highlight responsive-table">
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Permissão</th>
        <th></th>

    </tr>
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->privilege}}</td>
        <td>
            <a class="btn-flat btn-small" href="{{ url('/users/' . $user->id .'/edit') }}"><i class="material-icons">edit</i></a>  
        </td>
       
    </tr>
</table>

@endsection