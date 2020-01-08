@extends('layouts.app')

@section('content')

	<style>
		.backBox{
			display: block;
		}
	</style>

			@if(Session::has('status'))
				<script>
					Materialize.toast("{{Session::get('status')}}", 4000);
				</script>
			@endif

			<div class="row valign-wrapper container-center ">
				<div class="col s12">
					<div class="card white card-login">

						<div class="card-content">
							<span class="card-title center">Alterar senha</span>

								<form method="POST" action="{{ url('/password/reset') }}">
                                     {{ csrf_field() }}
 									<div class="input-field">
									    <input id="email" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autofocus>
								    </div>
								    <div class="input-field">
									    <input id="password" placeholder="Senha" name="password" type="password" name="password" required>
								    </div>
                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="input-field">
                                        <input id="password" placeholder="Confirme a Senha" name="password_confirmation" type="password" required>
								    </div>

									<input class="btn blue lighten-1" type="submit" name="submit_form" value="Alterar">
									</div>

								</form>

						</div>

					</div>
				</div>
			</div>
@endsection
