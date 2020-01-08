@extends('layouts.app')

@section('content')

<h5 class="center title" >Prefeituras Cadastradas</h5>

<form id="formFolder" name="folders" action="/works/searchByFolder" method="POST">
{{ csrf_field() }}
<div class="row">
<div class ="col menu prefeitura">
    <h6>Prefeituras</h6>
    @foreach($prefectures as $prefecture)
    <p>
      <input name="prefecture_id" value="{{$prefecture->id}}" type="radio" id="prefecture{{$prefecture->id}}" />
      <label for="prefecture{{$prefecture->id}}">
          <i class="material-icons">folder</i>{{$prefecture->name}}
      </label>
    </p>    
    @endforeach
</div>

<div class ="col menu vinculo">
<h6>Vínculo</h6>
    <p>
      <input name="bond" value="SIMEC" type="radio" id="simec" />
      <label for="simec">
          <i class="material-icons">folder</i>SIMEC
      </label>
    </p>
    <p>
      <input name="bond" value="SISMOB" type="radio" id="sismob" />
      <label for="sismob">
          <i class="material-icons">folder</i>SISMOB
      </label>
    </p>
    <p>
      <input name="bond" value="CAIXA" type="radio" id="caixa" />
      <label for="caixa">
          <i class="material-icons">folder</i>CAIXA
      </label>
    </p>
    <p>
      <input name="bond" value="CONDER" type="radio" id="conder" />
      <label for="conder">
          <i class="material-icons">folder</i>CONDER
      </label>
    </p>
    <p>
    <input name="bond" value="ESCRITÓRIO" type="radio" id="escritorio"/> 
    <label for="escritorio">
        <i class="material-icons">folder</i>ESCRITÓRIO
    </label>
    </p>
    <p>
    <input name="bond" value="OUTRO" type="radio" id="outro_vinculo"/> 
    <label for="outro_vinculo">
        <i class="material-icons">folder</i>OUTRO
    </label>
    </p>
    <p>
    <input name="bond" value="" type="radio" id="todos"/> 
    <label for="todos">
        <i class="material-icons">folder</i>TODOS
    </label>
    </p>
</div>


<div class ="col menu tipo">
<h6>Tipo</h6>
    <p>
      <input name="type_work" value="Pavimentação de Rua" type="radio" id="pav" />
      <label for="pav">
          <i class="material-icons">folder</i>Pavimentação de Rua
        </label>
    </p>
    <p>
      <input name="type_work" value="Residencial" type="radio" id="residencial" />
      <label for="residencial">
          <i class="material-icons">folder</i>Residencial
        </label>
    </p>
    <p>
      <input name="type_work"  value="Quadra" type="radio" id="quadra" />
      <label for="quadra">
          <i class="material-icons">folder</i>Quadra
        </label>
    </p>
    <p>
      <input name="type_work" value="Cobertura" type="radio" id="cobertura" />
      <label for="cobertura">
          <i class="material-icons">folder</i>Cobertura
        </label>
    </p>
    <p>
    <input name="type_work" value="Outro" type="radio" id="outro_tipo_obra"/> 
    <label for="outro_tipo_obra">
        <i class="material-icons">folder</i>Outro
    </label>
    </p>
    <p>
    <input name="type_work" value="" type="radio" id="todos_tipos_obras"/> 
    <label for="todos_tipos_obras">
        <i class="material-icons">folder</i>Todos
    </label>
    </p>
</div>
</div>

  </form>


@endsection
