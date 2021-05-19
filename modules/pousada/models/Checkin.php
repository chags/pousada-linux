<?php
	class Checkin extends DB
	{
		public function __construct(){
			# construct default
			parent::__construct();
		}

		public function entrar(){

			#verificando se exite hospede na sala
			$sala = parent::select("usuario",null,["usuario_local" => "sala"]); 

			//var_dump($a);

			if ($sala == ""){
				$_POST['usuario_local'] = "sala";
				$_POST['usuario_controle'] = "sim";				

			} else {
				foreach ($sala as $value) {
					if ($value['usuario_canal'] == $_POST['usuario_canal']){
						$_POST['usuario_local'] = "sala";
				        $_POST['usuario_controle'] = "nao";
					}else{
						$_POST['usuario_local'] = "quarto";	
				        $_POST['usuario_controle'] = "nao";									
					}
				}
			}

			
		    $id =  parent::insert("usuario", $_POST, null);

		    //$user = parent::select("usuario", null, ['id_usuario' => $id]);

		    //print_r($user);

		    $usuario = parent::select("usuario",null,['id_usuario' => $id], null);
		    parent::insert("logs",['log_observacao' => $usuario[0]["usuario_nome"]." Entrou na pousada"],null);	
		    $user = "usuario";
		    session_name($user);
            session_start();

			$_SESSION['usuario'] = [
    		'id_usuario'      =>   $usuario[0]['id_usuario'],				
    		'usuario_nome'    =>   $usuario[0]['usuario_nome'],
    		'usuario_imagem'  =>   $usuario[0]['usuario_imagem'],
    		'usuario_canal'   =>   $usuario[0]['usuario_canal'],    		
			];


			if ($id == null) {
				# code...
			return [ 'erro' => true, "mensagem" => "não foi possivel fazer o cadastro"];

			} else {
				return [ 'erro' => false, "mensagem" =>"Bem vindo a pousada linux", "id_usuario" => $usuario[0]['id_usuario']];			
			}
			
			
		}


	    public function sala(){

	       return  parent::select("usuario", null, null);
	    }

	    public function terminal(){
	       return  parent::select("logs", null, null, " ORDER BY id_log ASC LIMIT 10");	    	
	    }

	    public function Sair($user){

		    $dell = parent::delete('usuario',['id_usuario' => $user]);

             session_start();		    
		     session_destroy();

		    if ($dell == "") {

		    	return ['erro' => true, 'mensagem' => "Algo Deu errado, tente novamente"];		    	


		    } else {
		    	return ['erro' => false, 'mensagem' => "Boa viajem, Volte sempre"];

		    }
		    
	   }


	}


?>