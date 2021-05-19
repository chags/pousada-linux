<?php
	

	class Atom extends Core {

		public function __construct(){
			parent::__construct();
		}

		public function uri($key = null){
			# manager uri
			if( $key == null ){
				if( isset($_GET['route']) ){
					return explode("/", $_GET['route']);
				}else{
					return false;
				}
			}else{
				if( isset($_GET['route']) ){
					$pieces = explode("/", @$_GET['route']);
					if( $pieces ){
						return $pieces[$key - 1];
					}else{
						return false;
					}
				}else{
					return false;
				}
			}
		}

		public function path(){
			# get the root path /var/www/html...
			return $this->routes->path;
		}

		public function index(){
			# get the index path http://server.com
			return $this->routes->index;
		}

		public function view($segment, $module = ""){
			# make url do view module
			$module = ($module == "" or $module == null) ? $this->uri(1) : $module;
			return $this->index() . "/" . $module . "/" . $segment;
		}

		public function controller($file, $module = null){
			# get url to controller file
			$module = ($module == "" or $module == null) ? $this->uri(1) : $module;
			if( file_exists($this->path() . "/modules/" . $module . "/controllers/" . $file .".php") ){
				return $this->index() . "/modules/" . $module . "/controllers/" . $file .".php";
			}else{
				return '#controller-not-found';
				# controller file not found
			}
		}
	}
?>