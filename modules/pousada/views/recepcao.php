<?php
  $app = new Module();

?>
<div class="ui container">

	<h1>Check IN</h1>

	<h2 class="ui dividing header">Recepção</h2>
	<div class="ui stackable equal width grid">
		<div class="column">
			<form class="ui form" action="<?=$app->controller('checkin'); ?>" method="POST" >
				<input type="hidden" name="usuario_status" value="on">				
				<h4 class="ui dividing header">Faça seu Cadastro</h4>
				<div class="field">
					<label>Nome</label>
					<div class="two fields">
						<div class="field">
							<input type="text" name="usuario_nome" placeholder="Digite seu nome" required="true">
						</div>
					</div>
				</div>
				<div class="ui form">
					<div class="grouped fields">
						<label>Escolha seu avatar?</label>
						<div class="field">
							<div class="ui radio checkbox">
								<input type="radio" name="usuario_imagem" checked="checked" value="<?=Helper::avatar('tom.jpg'); ?>">
								<label><img class="ui avatar image" src="<?=Helper::avatar('tom.jpg'); ?>"></label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
								<input type="radio" name="usuario_imagem" value="<?=Helper::avatar('justen.jpg'); ?>">
								<label><img class="ui avatar image" src="<?=Helper::avatar('justen.jpg'); ?>"></label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
								<input type="radio" name="usuario_imagem" value="<?=Helper::avatar('christian.jpg'); ?>">
								<label><img class="ui avatar image" src="<?=Helper::avatar('christian.jpg'); ?>"></label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
								<input type="radio" name="usuario_imagem" value="<?=Helper::avatar('stevie.jpg'); ?>">
								<label><img class="ui avatar image" src="<?=Helper::avatar('stevie.jpg'); ?>"></label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
								<input type="radio" name="usuario_imagem" value="<?=Helper::avatar('matt.jpg'); ?>">
								<label><img class="ui avatar image" src="<?=Helper::avatar('matt.jpg'); ?>"></label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
								<input type="radio" name="usuario_imagem" value="<?=Helper::avatar('jenny.jpg'); ?>">
								<label><img class="ui avatar image" src="<?=Helper::avatar('jenny.jpg'); ?>"></label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
								<input type="radio" name="usuario_imagem" value="<?=Helper::avatar('elliot.jpg'); ?>">
								<label><img class="ui avatar image" src="<?=Helper::avatar('elliot.jpg'); ?>"></label>
							</div>
						</div>
					</div>
				</div>
				<div class="ui form">
					<div class="grouped fields">
						<label>Escolha seu canal de TV preferido?</label>
						<div class="field">
							<div class="ui radio checkbox">
								<input type="radio" name="usuario_canal" checked="checked" value="Telecine">
								<label>Telecine</label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
								<input type="radio" name="usuario_canal"  value="Premiere">
								<label>Premiere</label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
								<input type="radio" name="usuario_canal" value="HBO">
								<label>HBO</label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
								<input type="radio" name="usuario_canal" value="Discorery">
								<label>Discovery</label>
							</div>
						</div>
					</div>
				</div>
				<div class="field">
					<label>Tempo assitindo TV em segundos</label>
					<div class="two fields">
						<div class="field">
							<input type="text" name="usuario_tv" placeholder="digite um numero de 1 a 99" required="true">
						</div>
					</div>
				</div>
				<div class="field">
					<label>Tempo descansando no quarto em segundo</label>
					<div class="two fields">
						<div class="field">
							<input type="text" name="usuario_quarto" placeholder="digite um numero de 1 a 99" required="true">
						</div>
					</div>
				</div>				
				<button class="ui green button"  type="submit">Entrar</button>
			</form>
		</div>
	</div>
	<h2 class="ui dividing header"></h2>
</div>
<script>
	$('.ui.radio.checkbox')
	  .checkbox()
	;
</script>



