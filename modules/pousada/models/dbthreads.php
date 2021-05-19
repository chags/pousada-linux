<?php 

/*
    GitHub: https://github.com/matheusjohannaraujo/php_thread_parallel
    Country: Brasil
    State: Ceará
    Developer: Francisco cristiano chagas
    Date: 2020-12-30
*/

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



class dbthreads extends DB
{

    public function __construct(){
            # construct default
        parent::__construct();
    }

    public function getHospedes(){
        #recupera todo os hospedes da poudasa
        return parent::select("usuario", null, null);
    }

    public function logs($log,$hospede){

        switch ($log) {
            case '1':
                # entra na sala
                parent::insert("logs",['log_observacao' => $hospede." Entra na sala"],null);
                break;
            case '2':
                # entra no quarto
                parent::insert("logs",['log_observacao' => $hospede." Entra no quarto"],null);
                break;
            case '3':
                # Vai para  o quarto
                 parent::insert("logs",['log_observacao' => $hospede." sai da sala vai para o quarto"],null);
                break;
            case '4':
                # Vai para sala
                 parent::insert("logs",['log_observacao' => $hospede." sai do quarto vai para sala"],null);             
                break;
             case '5':
                # pegou o controle da tv
                  parent::insert("logs",['log_observacao' => $hospede."  Estava na sala sozinho e foi para o quarto"],null);             
                break;  
              case '6':
                # pegou o controle da tv
                  parent::insert("logs",['log_observacao' => $hospede."  estou aqui"],null);             
                break;                            
               case '7':
                # pegou o controle da tv
                  parent::insert("logs",['log_observacao' => $hospede."  entrou na sala e pegou controle"],null);             
                break;            
                case 'saiu':
                # HOSPEDE SAIU DA SALA
                parent::insert("logs",['log_observacao' => $hospede." saiu da pousada"],null);   
                break;
        }

    }

    //semaphore controle de tempo na sala
    public function semaphoreTV($id_usuario){
        
        $segundos = parent::select("usuario", null,['id_usuario' => $id_usuario]);
        $time = $segundos[0]['usuario_tv'];
        $i = 1;
        while ($i <= $time):
            $i++;
            parent::update("usuario",['usuario_tv' => $i],['id_usuario' => $id_usuario]);   
            sleep(1);
        endwhile;
            #recupera os segundo depois do while para usar posteriormente
            parent::update("usuario",['usuario_tv' => $segundos[0]['usuario_tv']],['id_usuario' => $id_usuario]);   

    }

    //semaphorecontrole de tempo no quarto
    public function semaphoreQuarto($id_usuario){
        
        $segundos = parent::select("usuario", null,['id_usuario' => $id_usuario]);
        $time = $segundos[0]['usuario_quarto'];
        $i = 1;
        while ($i <= $time):
            $i++;
            parent::update("usuario",['usuario_quarto' => $i],['id_usuario' => $id_usuario]);   
            sleep(1);
        endwhile;
            parent::update("usuario",['usuario_quarto' => $segundos[0]['usuario_quarto']],['id_usuario' => $id_usuario]);         
    }

    #criando a thread hospede!!
    public function Hospede($id_usuario){
        #trabalhando dentro da thread;
       while(1){

            #verificando se o hospede ainda esta na pousada
            $data = parent::select("usuario", null,['id_usuario' => $id_usuario]);

            if($data == ""){
               $log = $this->logs('saiu', "um hospede");
               break;
            }else{
                $hospede = $data[0];
            }
           
            if($hospede['usuario_local'] == "sala"){    
                #contando o tempo de sala 

                $this->logs(1,$hospede['id_usuario']);
                $this->semaphoreTV($hospede['id_usuario']);
                #passaNdo tempo assitindo verifica-se novamente como esta a sala
                $sala = parent::select("usuario", null,['usuario_local' => "sala"]);
                #Se o hospede estiver sozinho dentro da sala então ele pode ir para o quarto
                $num = count($sala);               
                if($num == 1 && $sala[0]['id_usuario'] == $hospede['id_usuario']){     
                #hospede indo para o quarto
                 parent::update("usuario",['usuario_local' => 'quarto', 'usuario_controle' => 'nao'],['id_usuario' => $hospede['id_usuario']]);    
                 
                }elseif ($num  >= 2 && $hospede['usuario_controle'] == "nao" ) {
                    # code...
                    parent::update("usuario",['usuario_local' => 'quarto', 'usuario_controle' => 'nao'],['id_usuario' => $hospede['id_usuario']]);
                }
                continue; 

            }else{
                #aqui ele esta no quarto
                $this->semaphoreQuarto($hospede['id_usuario']);
                #agora vamos verificar como esta a sala
                $sala = parent::select("usuario", null,['usuario_local' => "sala"]);
                #agroa vamos verifiar se podemos ir para a sal
                if($sala == ""){
                    parent::update("usuario",['usuario_local' => 'sala', 'usuario_controle' => 'sim'],['id_usuario' => $hospede['id_usuario']]); 
                    #hospede passa o tempo assitindo e com o controle na mão
                    //$this->semaphoreTV($hospede['id_usuario']);

                }elseif ($sala[0]['usuario_canal'] == $hospede['usuario_canal']) {
                    #Hospede entra na sala porque pessoas estão assitindo o  mesmo canal que ele
                    parent::update("usuario",['usuario_local' => 'sala'],['id_usuario' => $hospede['id_usuario']]); 
                     #passando tempo na sala                     
                    //$this->semaphoreTV($hospede['id_usuario']);
                                                          
                }
                continue;
                
            }           
        }
    }
}