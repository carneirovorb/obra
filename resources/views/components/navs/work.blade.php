


<nav>
	<div class="nav-wrapper green">
		<ul class="left hide-on-med-and-down">
      <li><a href="{{url('/works/' . $work_id)}}">Geral</a></li>
      <li><a href="{{url('/works/'. $work_id.'/accounts/')}}">Conta do Convênio</a></li>
      <li><a href="{{url('/works/'. $work_id.'/transfers/')}}">Resumo Finânceiro</a></li>
      <li><a href="{{url('/works/'. $work_id.'/financial/')}}">Execução Finânceira</a></li>
      <li><a href="{{url('/works/'. $work_id.'/report/')}}">Relatórios de Obra</a></li>
      <li><a href="{{url('/works/'. $work_id.'/users/')}}">Permissões de Usuários</a></li>
    </ul>


		<ul id="slide-out2" class="side-nav">

			<ul>
        <li><a href="{{url('/works/' . $work_id)}}">Geral</a></li>
        <li><a href="{{url('/works/'. $work_id.'/accounts/')}}">Conta do Convênio</a></li>
        <li><a href="{{url('/works/'. $work_id.'/transfers/')}}">Resumo Finânceiro</a></li>
        <li><a href="{{url('/works/'. $work_id.'/financial/')}}">Execução Finânceira</a></li>
        <li><a href="{{url('/works/'. $work_id.'/report/')}}">Relatórios de Obra</a></li>
        <li><a href="{{url('/works/'. $work_id.'/users/')}}">Permissões de Usuários</a></li>
			</ul>
		</ul>
		<a href="#" data-activates="slide-out2" class="button-collapse"><i class="material-icons">menu</i></a>
		</div>

</nav>
