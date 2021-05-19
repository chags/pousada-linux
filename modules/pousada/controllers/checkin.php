<?php	    

	# autoload application
	require dirname(dirname(dirname(__DIR__))) . "/autoload.php";

	$app = new Module();
	# include all modules of default module
	$app->loadModels('pousada');

	$dado = new Checkin();
	#grava os dados do usuario no banco e retorna com o id do usuario
	$response =  $dado->entrar();

	#instancia a a chase de threads
	$dados = new ClassThreads();

	#incia a thread

echo "<pre>";

// Scripts PHP que serão executados na Thread HTTP
$scripts = [
' 
   // hospede entra na sala
	$roda = $hospedes->Hospede('.$response['id_usuario'].');
	print_r($roda);
'
];

print_r($scripts);

// Localização do arquivo Thread HTTP
$thread_http =  $app->controller('thread_http', 'pousada');  //"http://localhost/php_thread_parallel/thread_http.php";

// Cria uma thread para cada script, e aguarda o fim da execução de todos os scripts para obter o respectivo resultado de cada um
$scripts = $dados->thread_parallel($scripts, $thread_http, false);

// Mostra o conteúdo retornado ao fim da execução de cada script
var_export($scripts);

echo "<hr>";

// ------------------------------------------------
// Executa script sem esperar pelo retorn se colocar ""false"" 
$scripts = $dados->thread_parallel(
'
	
	file_put_contents("file.txt", "inicio\r\n");
	for ($i = 1; $i <= 20; $i++) { 
		sleep(1);
		file_put_contents("file.txt", "$i\r\n");
	}
	file_put_contents("file.txt", "fim\r\n");
	sleep(1);
	unlink("file.txt");
	
', $thread_http, false);

// Mostra o status da requisição de cada script
var_export($scripts);

echo "<hr>";


	//print_r($response);

	if ($response['erro'] == true) {
		# caso dê tudo certo
		header("Location: " . $app->index() . "/apresentacao" . Helper::notification($response["erro"], $response["mensagem"]));
	} else {
		# caso dêalgo errado
		header("Location: " . $app->index() . "/pousada/sala" . Helper::notification(!$response["erro"], $response["mensagem"]));
	}

