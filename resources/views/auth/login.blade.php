@extends('layouts.app')

@section('content')


	<style>
		.backBox{
			display: block;
		}
	</style>
			<div class="row valign-wrapper container-center ">

			

				<div class="col s12">
				<div class="row center">
				<br>
					<img width="150" src="{{asset('img/logo2.jpeg')}}"/>
				</div>

				<div class="row">
					<div class="card white card-login">


						<div class="card-content">
							<span class="card-title center">Logar-se</span>

								<form method="POST" action="{{ route('login') }}">
                                     {{ csrf_field() }}
 									<div class="input-field">
									<input id="email" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autofocus>
								</div>
								<div class="input-field">

									<input id="password" placeholder="Senha" name="password" type="password" name="password" required>
								</div>
								<input class="btn blue lighten-1" type="submit" name="submit_form" value="Entrar">
									<br><br>
									<div class="card-action">
										<span style="float: right; padding-top: 6px;">
					            	<input id="remember" name="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
									<label for="remember" style="display: inline;">
										<span style="font-size: 16px; color: #4d4d4d;">Manter-me conectado</span>
										</label>
										</span>
									
									<a class="waves-effect waves-light modal-trigger" href="#Modal1">Esqueceu a senha</a>
									</div>

								</form>
							
						</div>

					</div>
				</div>
				</div>
			</div>


		<!-- Modal Structure -->
        <div id="Modal1" class="modal">
			<form method="post" action="{{ route('password.email') }}">
				{{ csrf_field() }}
				<div class="modal-content">
					<label for="email" class="">Email</label>
					<input id="email" name="email" class="" type="text">
				</div>
				<div class="modal-footer">
					<input class="modal-action modal-close btn-flat" type="submit" name="submit_form" value="Enviar link de recuperção">
					<a href="#!" class="modal-action modal-close btn-flat">Cancelar</a>
				</div>
			</form>
        </div>

	@endsection
