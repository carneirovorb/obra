  @extends('layouts.app')
  @section('content')
  @include('components.navs.work')
  <div class="center row">
    <h5>Dados da obra</h5>
    <br>
    <form class="view">
      @include('works.form')
    </form>
  </div>
  <div class="center row">

      @if($type >= 2)
      <a class="waves-effect waves-light btn" href="{{url('/works/'.$work_id.'/edit')}}"><i class="material-icons left">edit</i>Editar</a>
      @endif


  </div>

  @endsection
