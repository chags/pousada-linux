<?php
	

	class Curl extends Module
	{

		protected $curlConnection;
		protected $response;
		protected $error;
		protected $db;

		public function __construct()
		{
			parent::__construct();
			$this->db = new DB();
			$this->db->status();
		}

		public function send($set)
		{
			$this->curlConnection = curl_init();
			curl_setopt_array($this->curlConnection, array(
			  CURLOPT_URL => $set['url'],
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_USERAGENT => "Request-atomo-framework",
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => strtoupper($set['method']),
			));

			if( isset($set['header'])){
				curl_setopt_array($this->curlConnection, array(
				  CURLOPT_HTTPHEADER => $set['header']
				));
			}

			# tratamento de dados de envio
			if( isset($set["body"]) ){
				curl_setopt_array($this->curlConnection, array(
				  CURLOPT_POSTFIELDS => json_encode($set['body'])
				));
			}

			# finalização
			$this->response = curl_exec($this->curlConnection);

			# log
			if( $this->config->debug == 1 ){
				$log["request"] = $set;
				$log["response"] = $this->response;
				$log["curl_error"] = $this->error = curl_error($this->curlConnection);
				# geração de log
				file_put_contents(parent::path()."/storage/logs/curl/json/".date("YmdHis").".json", json_encode($log));
			}

			curl_close($this->curlConnection);
		
			return json_encode(json_decode($this->response,true), JSON_UNESCAPED_UNICODE);
		}
	}
?>