<?php
	
	# autoload application 
	require dirname(dirname(dirname(__DIR__))) . "/autoload.php";

	$app = new Module();
	# include all modules of default module 
	$app->loadModels('pousada');

	//iniciar o arquivo ajax

   header('Content-Type: application/json');

   $usuarios = new checkin();

   $response = $usuarios->terminal();

   echo $result = json_encode($response, true);