<nav>
	<div class="nav-wrapper green">
		<div class="container">
		<a href="{{url('/')}}" class="brand-logo center">Amado Engenharia</a>
		<ul class="left hide-on-med-and-down">
			@if (Auth::user()->privilege == 2)
				<li><a class="btn-small tooltipped" data-position="bottom" data-delay="0" data-tooltip="Cadastrar nova obra"
								href="{{url('/works/create')}}"><i class="material-icons">work</i></a></li>
				<li><a class="btn-small tooltipped" data-position="bottom" data-delay="0" data-tooltip="Cadastrar novo usuário"
								href="{{ url('/users/create') }}"><i class="material-icons">person_add</i></a></li>
				<li><a class="btn-small tooltipped" data-position="bottom" data-delay="0" data-tooltip="Gerenciar usuários"
								href="{{url('/users')}}"><i class="material-icons">recent_actors</i></a></li>
			@elseif (Auth::user()->privilege == 1)
				<li><a class="btn-small tooltipped" data-position="bottom" data-delay="0" data-tooltip="Cadastrar nova obra"
								href="{{url('/works/create')}}"><i class="material-icons">work</i></a></li>
			@endif
			<li><a class="btn-small tooltipped" data-position="bottom" data-delay="0" data-tooltip="Listar Obras"
							href="{{url('/home')}}"><i class="material-icons">view_list</i></a></li>
			<li><a class="btn-small tooltipped" data-position="bottom" data-delay="0" data-tooltip="Listar Prefeituras"
							href="{{url('/works/searchByFolder')}}"><i class="material-icons">folder_open</i></a></li>
			<li><a class="btn-small tooltipped" data-position="bottom" data-delay="0" data-tooltip="Filtrar Obras" href="#modal1"><i class="material-icons">search</i></a></li>
		</ul>


		<ul class="right hide-on-med-and-down">
			<li class="active">
				<a class='dropdown-button right' href='#' data-beloworigin="true" data-activates='dropdownUser'><i class="material-icons right">perm_identity</i>{{Auth::user()->name}}</a>
				<!-- Dropdown Structure -->
				<ul id='dropdownUser' class='dropdown-content'>
					<li><a href="{{url('/users/' . Auth::user()->id .'/profile')}}"><i class="material-icons">mode_edit</i> Editar Perfil</a></li>
					<li>
						<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons">power_settings_new</i> Sair</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</li>
				</ul>
			</li>
		</ul>

		<ul id="slide-out" class="side-nav">
			<li>
				<div class="userView">
					<div class="background">
						<img src="http://graphicdesignjunction.com/wp-content/uploads/2011/03/background-pattern-design-13.jpg">
					</div>
					<a href="{{url('/users/' . Auth::user()->id .'/edit')}}"><img class="circle" src="http://www.bellavistahotelbulgaria.com/images/logo/user.png"></a>
					<a href="{{url('/users/' . Auth::user()->id .'/edit')}}"><span class="white-text name"><i class="material-icons right">settings</i>{{Auth::user()->name}}</span> </a>
					<a href="#!email"><span class="white-text email">{{Auth::user()->email}} </span></a>
				</div>
			</li>

			<ul>
				<li>
					<a class="btn-small" href="{{url('/works/create')}}"><i class="material-icons">work</i>Cadastrar nova obra</a>
				</li>
				<li>
					<a class="btn-small" href="{{url('/home')}}"><i class="material-icons">view_list</i>Listar Obras</a>
				</li>
				<li>
					<a class="btn-small" href="{{ url('/users/create') }}"><i class="material-icons">person_add</i>Cadastrar novo usuário</a>
				</li>
				<li>
					<a class="btn-small" href="{{url('/users')}}"><i class="material-icons">recent_actors</i>Gerenciar usuários</a>
				</li>
				<li>
					<a class="btn-small" href="#modal1"><i class="material-icons">search</i>Filtrar Obras</a>
				</li>
				<li><div class="divider"></div></li>
				<li><a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="#">Sair <i class="material-icons left">settings_power</i></a></li>
			</ul>
		</ul>
		<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
		</div>
	</div>
</nav>




<!-- Modal Trigger -->


<!-- Modal Structure -->
<div id="modal1" style="top: 0px;" class="modal modalSearch bottom-sheet">
	<div class="modal-content container">
		<form action="/works/search" method="POST">
			{{ csrf_field() }}
			<div class="input-field">
		  		<input id="search" name="search" class="z-depth-1" type="search" placeholder="Pesquisar">
		  		<label class="label-icon" for="search"><i class="material-icons">search</i></label>
			</div>

			<br><br>


			<div class="modal-footer">
				<button class="btn waves-effect waves-light" type="submit" name="action">Buscar
					<i class="material-icons right">search</i>
	 			</button>
	 		</div>
		</form>
	</div>
</div>
