<?php
	

	class _Error {

		# error 404
		public static function notFound($title = "Erro 404", $content = "Conteudo não encontrado")
		{
			echo '<div class="jumbotron jumbotron-fluid">
				  <div class="container">
				    <h1 class="display-4">'.$title.'</h1>
				    <p class="lead">'.$content.'</p>
				  </div>
				</div>';
		}

		# error 500
		public static function internalError($title = "Erro 500", $content = "Erro interno de servidor")
		{
			echo '<div class="jumbotron jumbotron-fluid">
				  <div class="container">
				    <h1 class="display-4">'.$title.'</h1>
				    <p class="lead">'.$content.'</p>
				  </div>
				</div>';
		}

	}
?>