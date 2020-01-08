		<div class="row">
			<div class="input-field col s7">
				<i class="material-icons prefix validate">account_circle</i>
				<input placeholder="Nome do Usuário" type="text" value="{{isset($user)? $user->name : ''}}" name="name" />
				<label required="required" for="name">Nome</label>
			</div>

			<div class="input-field col s5">
				<i class="material-icons prefix validate">security</i>
				<select required="required" name="privilege">
					<option value="0" {{(isset($user) && $user->privilege == 0)? 'selected' : ''}}>Básicos</option>
					<option value="1" {{(isset($user) && $user->privilege == 1)? 'selected' : ''}}>Administrador</option>
				</select>
				<label>Privilégios</label>
			</div>
		</div>

		<div class="row">
			<div class="input-field col s6">
				<i class="material-icons prefix validate">email</i>
				<input required="required" placeholder="Entre com o email" type="email" value="{{isset($user)? $user->email : ''}}" name="email" value="">
				<label for="email" data-error="Formato de email inválido">Email</label>
			</div>

			<div class="input-field col s6">
				<i class="material-icons prefix validate">account_circle</i>
				<input class="cpf" required="required" placeholder="CPF" type="text" name="cpf" value="{{isset($user)? $user->cpf : ''}}">
				<label for="cpf" data-error="">CPF</label>
			</div>
		</div>

<!--
        <div class="row">
            <div class="input-field">
                <i class="material-icons prefix validate">vpn_key</i>
                <input placeholder="Senha" type="password" name="password" required pattern=".{4,16}" title="A senha deve ter entre 4 e 10 caracteres">
                <label for="password" data-error="">Senha</label>
            </div>
        </div>
			-->
