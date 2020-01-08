@extends('layouts.app')
@section('content')
@include('components.navs.work')
<h5 class="center">Relatórios</h5>

<!-- Modal Structure -->
<div id="report" class="modal bottom-sheet">
  <div class="modal-content container center">
    <h5>Anexar Novo Relatório</h5>
    <div class="center row">
      <form class="col s12 view" method="POST"  enctype="multipart/form-data" action="{{ url('/works/'.$work_id.'/report') }}">
        {{ csrf_field() }}
        <div class="center row">

          <div class="file-field input-field col s5">
            <div class="btn">
              <span>Selecionar Arquivo</span>
              <input type="file" name="file_name">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
          </div>

          <div class="input-field col s5">
            <input id="file_description" name="file_description" type="text" class="">
            <label for="file_description">Observações</label>
          </div>


          <div class="input-field inline  col s2">
            <input  name="file_date" type="text" class="datepicker">
            <label>Data</label>
          </div>
          <input type="hidden" name="work_id" value="{{$work_id}}">
          <br/>
          <br/>



          <div class="center row">

            <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
            <i class="material-icons right">send</i>
            </button>

          </div>

        </div>
      </form>
      <br><br>
    </div>
  </div>

</div>


<div class="center row">
@if($reports->isNotEmpty())
  <table class="striped highlight">
    <thead>
      <tr>
        <th>Arquivo</th>
        <th>Descrição</th>
        <th>Data de Envio</th>
        <th>Excluir</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($reports as $report)
      <tr>
        <td>
          <a href="{{url('/works/'.$work_id.'/report/'.$report->id)}}">{{$report->file_description}}</a>
        </td>
        <td >{{$report->file_description}}</td>
        <td >{{$report->created_at}}</td>
        <td >
          <form  action="{{ url('/works/'.$work_id.'/report/'.$report->id) }}" method="POST">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" data-tooltip="Deletar" class="linkButton tooltipped">
              <i class="material-icons">delete</i>
            </button>
          </form>
        </td>
      </tr>
      @endforeach      
    </tbody>
  </table>
@else
  <center>Sem relatórios anexados.</center>
@endif
</div>

<br/>
<br/>
<div class="center row">
  <a class="waves-effect waves-light btn modal-trigger" href="#report">Anexar Novo Relatório    
  </a>

</div>


@endsection
