<?php
	
	$module   = new Module();
	$template = new TEngine();

	# validate view
	if( $module->uri(2) == false ){
		$module->goToModule();
	}

	# validate session
	//if( Session::auth() ){
	//header("Location: " . $module->index() . "/sala");
	//}

	$validate = $module->validate();

	if( $validate['error'] == false ){
		
		# default routes
		$template->set([
			'sala' => [
				'title'   => 'Sala de TV',
			  	'file' 	  => 'sala',
			    'packages' => ['semantic']				
			],
			'recepcao' => [
				'title'   => 'recepcao',
			  	'file' 	  => 'recepcao',
			    'packages' => ['semantic']				
			],			
			'checkin' => [
				'title'   => 'Check in',
				'file' 	  => 'checkin',
			    'packages' => ['semantic']				
			],
			'documentacao' => [
				'title'   => 'documentacao',
				'file' 	  => 'documentacao',
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