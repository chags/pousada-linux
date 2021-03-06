<?php
/*
	GitHub: https://github.com/matheusjohannaraujo/php_thread_parallel
	Country: Brasil
	State: Pernambuco
	Developer: Matheus Johann Araujo
	Developer adapted: Francisco cristiano Chagas
	Date: 2020-12-26
*/
# autoload application 
require dirname(dirname(dirname(__DIR__))) . "/autoload.php";

$app = new Module();
# include all modules of default module 
$app->loadModels('pousada');

#estanciando class que controla o banco de dados
$hospedes = new dbthreads();



error_reporting(E_ALL);
ini_set('default_charset', 'utf-8');
ini_set("set_time_limit", 3600);
ini_set("max_execution_time", 3600);
ini_set("default_socket_timeout", 3600);
ini_set("max_input_time", 3600);
ini_set("max_input_time", 3600);
ini_set("max_input_vars", 6000);
ini_set("memory_limit", "6144M");
ini_set("post_max_size", "6144M");
ini_set("upload_max_filesize", "6144M");
ini_set("max_file_uploads", 200);

$script = (string) ($_POST["script"] ?? "");

if (!empty($script)) {
    ob_start();
    try {
        $script = base64_decode($script);
        eval($script);
    } catch (\Throwable $th) {
        var_export($th);
    }    
    $script = ob_get_clean();
} else {
    $script = "";
}

die(base64_encode($script));
