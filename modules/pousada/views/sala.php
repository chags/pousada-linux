<?php
session_start();
$app = new Module();

/*
$valor = isset($_SESSION['usuario']) ? : header("Location: " . $app->index() . "/apresentacao" . Helper::notification(!$response["erro"], $response["mensagem"]));
*/
?>
<div class="ui container">

	<h1>Pousada linux</h1>

	<h2 class="ui dividing header">Recepção</h2>
	<div class="ui stackable equal width grid">
		<div class="column">
			<h1 class="ui header green">Sala de TV <i class="tv icon green"></i></h1>
			<p>Hospedes assitindo televisão</p>			
			<div class="ui middle aligned divided list" id="sala" >
				<!-- array de dados -->
			</div>
		</div>
		<div class="column">
			<h1 class="ui header blue">Quarto <i class="tv icon blue"></i></h1>
			<p>Hospedes assitindo televisão</p>			
			<div class="ui middle aligned divided list" id="quarto" >
				<!-- array de dados -->
			</div>
		</div>
	</div>
	<h2 class="ui dividing header"></h2>
	<div class="ui stackable equal width grid">
		<div class="column black">
			<h1 class="ui header green"><i class="fas fa-terminal"></i></h1>
			<p>Logs</p>			
			<div class="ui middle aligned divided list" id="terminal" >
				<!-- array de dados -->
			</div>
		</div>
	</div>	
</div>
