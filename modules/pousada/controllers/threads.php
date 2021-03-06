<?php 
	# autoload application
	require dirname(dirname(dirname(__DIR__))) . "/autoload.php";

	$app = new Module();
	# include all modules of default module
	$app->loadModels('pousada');
	$dados = new ClassThreads();	

/*

	Este código permite executar scritps PHP de forma simultanea,
	onde cada script será executado em uma Thread distinta
	-
	Observação: Os scripts serão executados de forma paralela, porém
	o script (main) que criou as Threads vai aguardar até que todos
	os scripts terminem de executar para retornar o resultado da
	execução de cada script. É semelhante a criar várias Threads e
	executar o comando "JOIN" que só deixa o script principal (main)
	prosseguir quando as Threads terminam de serem executadas

*/



echo "<pre>";

// Scripts PHP que serão executados na Thread HTTP
$scripts = [
'
	// hospede 1
	echo "hello";
	$lista = $hospedes->getHospedes();
	print_r($lista);
',
'
	// Hospede 2
	function test() {
		sleep(1);
		echo "Software desenvolvido por Matheus Johann Araujo";
	}
	test();
',
'
	// hospede 3
	echo "loop ";
	for ($i = 0; $i <= 20; $i++) { 
		echo $i, " ";
	}
',
'
	// hospede 4
	echo "loop ";
	for ($i = 0; $i <= 20; $i++) { 
		echo $i, " ";
	}
'



];

// Localização do arquivo Thread HTTP
$thread_http =  $app->controller('thread_http', 'pousada');  //"http://localhost/php_thread_parallel/thread_http.php";

// Cria uma thread para cada script, e aguarda o fim da execução de todos os scripts para obter o respectivo resultado de cada um
$scripts = $dados->thread_parallel($scripts, $thread_http);

// Mostra o conteúdo retornado ao fim da execução de cada script
var_export($scripts);

echo "<hr>";

// ------------------------------------------------
// Executa script sem esperar pelo retorn
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
