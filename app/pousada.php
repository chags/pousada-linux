<?php
  $template = new TEngine();
  $app = new Module();
  //print_r($_SESSION);

 //echo '<br>';

  //$user = $_SESSION['user']['id_usuario'];

  //echo $user;

    //$template->css();
    //$template->js();

   // $template->component('sweetalert-notification');
  //  $template->component('nav');
  //  $template->component('sidebar');        
    //$template->invokeView();
    //$template->component('footer');
//$template->title();

?>

<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Pousada Linux</title>

  <?php
    $template->css();
   ?>

  <style type="text/css">
  body {
    background-color: #FFFFFF;
  }
  .ui.menu .item img.logo {
    margin-right: 1.5em;
  }
  .main.container {
    margin-top: 7em;
  }
  .wireframe {
    margin-top: 2em;
  }
  .ui.footer.segment {
    margin: 5em 0em 0em;
    padding: 5em 0em;
  }
  </style>

</head>
<body>

<div class="ui teal fixed inverted menu">
    <div class="ui container">
      <a href="#" class="header item">
        <img class="logo" src="<?=Helper::imagem('linux'); ?>">
         Pousada Linux
      </a>
       <a href="<?=$app->view('sala', 'pousada'); ?>" class="item">Sala</a>     
      <a href="<?=$app->view('documentacao', 'pousada'); ?>" class="item">Documentação</a>

      <a class="item" href="<?=$app->controller('sair', 'pousada'); ?>">Sair</a>
    </div>
</div>
<?php

$template->invokeView();
$template->component('footer');
$template->js();
$template->component('sweetalert-notification');


?>

</body>

</html>
