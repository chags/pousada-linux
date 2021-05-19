

<?php 

/*
    GitHub: https://github.com/matheusjohannaraujo/php_thread_parallel
    Country: Brasil
    State: Ceará
    Developer: Francisco cristiano chagas
    Date: 2020-12-30


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

    public function Hospede($id_usuario){
        #trabalhando dentro da thread;
        while (1) {
            $id = parent::select("usuario", null,['id_usuario' => $id_usuario]);
            if ($id == "") {
                # verificando se o usuario esta conectado no sistema se não existe o 
                # se o usuario não se encontrar na pousada a theads é encerrada.
                $this->logs("saiu",$id[0]['usuario_nome']);
                break;
            } else {
                #vida que segue!!!!
                #olhando quem esta na sala
                $sala = parent::select("usuario",null,["usuario_local" => "sala"]); 
                //verificando a lotação
                if($sala[0]['usuario_local'] == "" || $sala == ""){
                    parent::update('usuario',['usuario_local' => 'sala','usuario_controle' => 'sim'],['id_usuario' => $id[0]['id_usuario']]);
                    $this->logs(1,$id[0]['usuario_nome']);
                    $this->semaphoreTV($id_usuario);
                    continue;
                }elseif($sala[0]['usuario_canal'] == $id[0]['usuario_canal']){
                    #entra na sala se o canal for o mesmo.
                    parent::update('usuario',['usuario_local' => 'sala','usuario_controle' => 'nao'],['id_usuario' => $id_usuario]);     
                     #chamando a semaforá para manter o usuario na sala.
                    $this->semaphoreTV($id_usuario);
                    #verificando novamanete a sala
                    $sala = parent::select('usuario',null,['usuario_local' => 'sala']);
                    #verificando meu status na sala
                    $id = parent::select("usuario", null,['id_usuario' => $id_usuario]);
                    
                    if (count($sala) > 1 && $id[0]["usuario_controle"] == "nao"){
                        # se tem gente na sala 
                        parent::update("usuario",['usuario_local' => "quarto"],['id_usuario' => $id[0]["id_usuario"]]);
                        //$this->logs(4,$id[0]['usuario_nome']);
                        $this->semaphoreQuarto($id_usuario);
                       continue; 
                    }elseif(count($sala) == 1 && $id[0]['usuario_controle'] == 'sim') {
                        #eu estava na sala sozinho e fui para o quarto
                        parent::update("usuario",['usuario_local' => "quarto",'usuario_controle' => 'nao'],['id_usuario' => $id_usuario]);
                         $this->logs(5,$id[0]['id_usuario']);                       
                        $this->semaphoreTV($id_usuario);  
                        continue;              
                    }

                } else {

                    #mando o hospede para o quarto
                    parent::update("usuario",['usuario_local' => "quarto", 'usuario_controle' => "nao"],['id_usuario' => $id[0]["id_usuario"]]); 
                    # chamando a semaphora que faz ousuario descançar no quarto.
                    $this->semaphoreQuarto($id_usuario);
                    #olhando quem esta na sala
                    $sala = parent::select("usuario",null,["usuario_local" => "sala"]); 
                    //verificando a lotação
                    if($sala[0]['usuario_local'] == "" || $sala == ""){
                        parent::update("usuario",['usuario_local' => 'sala', 'usuario_controle' => 'sim'],['id_usuario' => $id_usuario]);
                        #hospede entra na sala e pega o controle remoto
                        $this->logs(7,$id[0]['id_usuario']);                         
                        $this->semaphoreTV($id_usuario);
                        continue;

                    }elseif($sala[0]['usuario_local'] == "sala" && $sala[0]['usuario_canal'] == $id[0]['usuario_canal']) {
                         #entra na sala se o canal for o mesmo.
                         parent::update("usuario",['usuario_local' => "sala"],['id_usuario' => $id_usuario]);
                       #chamando a semaforá para manter o usuario na sala.
                            $this->semaphoreTV($id_usuario);
                            #verificando novamanete a sala
                            $sala = parent::select("usuario",null,["usuario_local" => "sala"]);
                            #verificando meu status na sala
                            $id = parent::select("usuario", null,['id_usuario' => $id_usuario]);

                            if (count($sala) > 1 && $id[0]["usuario_controle" == "nao"])  {
                                # se tem gente na sala 
                                parent::update("usuario",['usuario_local' => "quarto"],['id_usuario' => $id[0]["id_usuario"]]);
                                $this->semaphoreQuarto($id_usuario);                               
                                continue;                               
                            }elseif(count($sala) == 1 && $id[0]['usuario_controle'] == 'sim') {
                                #eu estava na sala sozinho e fui para o quarto
                                parent::update("usuario",['usuario_local' => "quarto",'usuario_controle' => 'nao'],['id_usuario' => $id_usuario]);
                                                    
                                $this->semaphoreQuarto($id_usuario);
                        
                                continue;                                               
                            }
                    }
                }
            }

        }

    }
}
*/