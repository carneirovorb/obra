@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="center">Usuários Cadastrados</h5>
                </div>
                <div class="panel-body">
                    @if($users->isNotEmpty())
                    <table class="highlight striped">

                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Privilégios</th>
                                <th class="ico center">Editar</th>

                            </tr>
                        </thead>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            @if($user->privilege == 1)
                                <td>Administrador</td>
                            @endif
                            @if($user->privilege == 2)
                                <td>Proprietário</td>
                            @endif
                            @if($user->privilege == 0)
                                <td>Básicos</td>
                            @endif
                            <td>
                              <a href="{{ url('/users/' . $user->id . '/edit') }}" class="linkButton tooltipped" data-tooltip="Editar dados"><i class="material-icons">edit</i></a>



                                  </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                        <center>Ainda não há usuários cadastrados</center>
                    @endif
                </div><br><br>
                @if(Auth::user()->privilege >= 1)
                <a href="{{ url('/users/create') }}" class="btn ">Novo Usuario <i class="material-icons right">add</i></a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
