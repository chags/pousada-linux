<?php
	

	class Helper
	{
		private $app;

		public static function money($money){
			return number_format(($money / 100),2);
		}

		public static function _date($date){
			return date("d/m/Y",strtotime($date));
		}

		public static function notification($success = true, $message = "Notificação de sistema"){
			if( $success ){
				return "/alert/" . base64_encode("success=" . $message);
			}else{
				return "/alert/" . base64_encode("error=" . $message);
			}
		}

		public static function imagem($name = "")
		{
			$app = new Module();
			$pathImg = $app->path() . "/storage/imagem/" . $name;
			$indexImg = $app->index() . "/storage/imagem/" . $name;
			$defaultImg = $app->index() . "/storage/imagem/linux.png";
			if( $name != "" ){
				return (file_exists($pathImg) and is_file($pathImg)) ? $indexImg : $defaultImg;
			}else{
				return $defaultImg;
			}
		}
 		public static function avatar($name = "")
		{
			$app = new Module();
			$pathImg = $app->path() . "/storage/avatar/" . $name;
			$indexImg = $app->index() . "/storage/avatar/" . $name;
			$defaultImg = $app->index() . "/public/assets/images/user-default.jpg";
			if( $name != "" ){
				return (file_exists($pathImg) and is_file($pathImg)) ? $indexImg : $defaultImg;
			}else{
				return $defaultImg;
			}
		}



		public static function sanitize($string){
			$from 	= array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');
			$_to 	= array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');
			return str_replace($from, $_to, $string);
		}
	}
?>