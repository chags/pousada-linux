<?php
	
	$module   = new Module();
	$template = new TEngine();

	# validate view
	if( $module->uri(2) == false ){
		$module->goToModule();
	}

	# validate session
	//if( Session::auth() ){
	//header("Location: " . $module->index() . "/pousada/sala");
	//}

	$validate = $module->validate();

	if( $validate['error'] == false ){
		
		# default routes
		$template->set([
			'pousada' => [
				'title'   => 'Bem vindo a Pousada Linux',
				'file' 	  => 'pousada',
			    'packages' => ['semantic']				
			]
			
		]);

		$template->error([
			'title' => 'Falha na geração da pagina',
			'file' => '404',
			'packages' => ['semantic']
		]);

	}else{
		# show error core
		$module->coreError("Internal Error" , $validate['message']);
	}


?>