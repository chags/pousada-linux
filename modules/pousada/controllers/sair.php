<?php

session_start();
	# autoload application
	require dirname(dirname(dirname(__DIR__))) . "/autoload.php";

	$app = new Module();
	# include all modules of default module
	$app->loadModels('pousada');
	
	//colocando a session  do usuario num array
	$user = $_SESSION;
	//separando a rray o numero do usuario.
	$user = $_SESSION['usuario']['id_usuario'];

    $sair = new Checkin();

    $response = $sair->Sair($user);


if ($response['erro'] == true) {
		# caso dê tudo certo
		header("Location: " . $app->index() . "/apresentacao" . Helper::notification($response["erro"], $response["mensagem"]));
	} else {
		# caso dêalgo errado
		header("Location: " . $app->index() . "/pousada/sala" . Helper::notification($response["erro"], $response["mensagem"]));
	}
	



