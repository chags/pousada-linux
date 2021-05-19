<?php
  $template = new TEngine();
  $app = new Module();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>IFCE engenharia da computação</title>
    <meta name="description" content="Bitnami: Open Source. Simplified.">
    <meta name="author" content="Bitnami">
    <link rel="stylesheet" media="screen" href="//unpkg.com/@bitnami/hex/dist/hex.min.css">
  </head>
  <body>
    <main class="margin-t-huge">
      <section aria-labelledby="installation-title" aria-describedby="installation-desc" class="container container-tiny margin-b-giant">
        <h1 id="installation-title">IFCE - Engenharia da computação</h1>
        <div aria-hidden="true" style="height: 4px; width: 100%;" class="gradient-135-brand"></div>
        <p id="installation-desc" class="type-big">Sistemas Operacionais <br>
          Professor:<strong>Fernando Parente Garcia</strong></p>
      </section>
      <section aria-labelledby="links-title" aria-describedby="links-desc" class="bg-light padding-v-bigger margin-v-enormous">
        <div class="container container-tiny">
          <div class="row row-collapse-b-tablet align-center ">
            <div class="col-6">
              <h3 id="links-title" class="margin-t-reset">Pousada Linux</h3>
              <p id="links-desc" class="margin-b-reset">Trabalho de theads para a disciplina de sistemas operacionais.</p>
            </div>
            <div class="col-6">
              <ul class="remove-style margin-reset">
                <li class="padding-v-normal"><a href="<?=$app->view('recepcao', 'pousada'); ?>" target="_blank" style="width: 100%;" class="button text-c button-accent">Acesso de Hospede</a></li>
                <li class="padding-v-normal"><a href="<?=$app->view('documentacao', 'pousada'); ?>" target="_blank" style="width: 100%;" class="button text-c button-primary">Documentação</a></li>
                <li class="padding-v-normal"><a href="" target="_blank" style="width: 100%;" class="button text-c button-primary">Banco de dados</a></li>
              </ul>
            </div>
          </div>
        </div>
      </section>

    </main>
    <footer class="text-c">
      <div class="container container-tiny margin-v-enormous">
        <hr class="separator separator-small margin-b-bigger">
        <a href="" title=""></a> <img src="https://ifce.edu.br/prpi/documentos-1/semic/2017/logo-horizontal-ifce.png/@@images/de79e070-1bc2-4aba-88a4-9aad10a9cd69.png"  alt=""  width="200" height="auto" >
        <p class="type-small margin-reset"></p>
      </div>
    </footer>
  </body>
</html>
<?php
$template->js();
$template->component('sweetalert-notification');
?>