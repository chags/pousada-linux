<?php
	$template = new TEngine();
	$app = new Module();
?>
<body class="m4-cloak h-vh-100">
<div data-role="navview" data-toggle="#paneToggle" data-expand="xl" data-compact="lg" data-active-state="true">
    <div class="navview-pane">
        <div class="bg-cyan d-flex flex-align-center">
            <button class="pull-button m-0 bg-darkCyan-hover">
                <span class="mif-menu fg-white"></span>
            </button>
            <h2 class="text-light m-0 fg-white pl-7" style="line-height: 52px">H7x</h2>
        </div>

        <div class="suggest-box">
            <div class="data-box">
                <img src="<?=Helper::avatar($_SESSION['usuario_imagem']); ?>" class="avatar">
                <div class="ml-4 avatar-title flex-column">
                    <a href="#" class="d-block fg-white text-medium no-decor"><span class="reduce-1"><?=$_SESSION["usuario_apelido"]; ?></span></a>
                    <p class="m-0"><span class="fg-green mr-2">&#x25cf;</span><span class="text-small">online</span></p>
                </div>
            </div>
            <img src="<?=Helper::avatar($_SESSION['usuario_imagem']); ?>" class="avatar holder ml-2">
        </div>
        <ul class="navview-menu mt-4" id="side-menu" style="height: calc(100% - 10px);"  >
        	<li class="item-header">MAIN NAVIGATION</li>
            <li>
                <a href="<?=$app->view('welcome','painel'); ?>">
                    <span class="icon"><span class="mif-meter fg-green"></span></span>
                    <span class="caption">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">
                    <span class="icon"><i class="fas fa-store fg-blue"></i></span>
                    <span class="caption fg-blue">Loja</span>
                </a>
                <ul class="navview-menu stay-open" data-role="dropdown">
                    <li class="item-header"></li>
                    <li><a href="<?=$app->view('cadastra-produto','painel'); ?>">
                        <span class="icon"><span class="mif-tags"></span></span>
                        <span class="caption">Cadastra produto</span>
                    </a>
                    </li>                  
                    <li class="item-header"></li>
                    <li><a href="<?=$app->view('lista-produto','painel'); ?>">
                        <span class="icon"><span class="mif-shopping-basket2"></span></span>
                        <span class="caption">Lista Produto</span>
                    </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">
                    <span class="icon"><span class="mif-contacts-mail fg-blue"></span></span>
                    <span class="caption fg-blue">Usuarios</span>
                </a>
                <ul class="navview-menu stay-open" data-role="dropdown">
                    <li class="item-header"></li>
                    <li><a href="<?=$app->view('cadastra-usuario','painel'); ?>">
                        <span class="icon"><span class="mif-user-plus"></span></span>
                        <span class="caption">Cadastro de Usuarios</span>
                    </a>
                    </li>                  
                    <li class="item-header"></li>
                    <li><a href="<?=$app->view('lista-usuario','painel'); ?>">
                        <span class="icon"><span class="mif-users"></span></span>
                        <span class="caption">Lista Usuarios</span>
                    </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">
                    <span class="icon"><span class="mif-add-shopping-cart fg-blue"></span></span>
                    <span class="caption fg-blue">Vendas</span>
                </a>
                <ul class="navview-menu stay-open" data-role="dropdown">
                    <li class="item-header"></li>
                    <li><a href="<?=$app->view('lista-pedidos','painel'); ?>">
                        <span class="icon"><span class="mif-list"></span></span>
                        <span class="caption">lista pedidos</span>
                    </a>
                    </li>                  
                    <li class="item-header"></li>
                    <li><a href="<?=$app->view('lista-vendas','painel'); ?>">
                        <span class="icon"><span class="mif-list2"></span></span>
                        <span class="caption">Lista Vendas</span>
                    </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">
                    <span class="icon"><span class="mif-library fg-green"></span></span>
                    <span class="caption fg-blue">Configurações</span>
                </a>
                <ul class="navview-menu stay-open" data-role="dropdown">
                    <li class="item-header"></li>
                    <li>
                    	<a href="<?=$app->view('cadastra-uniao','painel'); ?>">
                        <span class="icon"><i class="fas fa-city"></i></span>
                        <span class="caption">Cadastra União</span>
                    </a>
                    </li> 

                    <li class="item-header"></li>
                    <li>
                    	<a href="<?=$app->view('cadastra-campo','painel'); ?>">
                        <span class="icon"><i class="fas fa-ethernet"></i></span>
                        <span class="caption">Cadastra Campo</span>
                    </a>
                    </li>

                    <li class="item-header"></li>
                    <li>
                    	<a href="<?=$app->view('cadastra-regiao','painel'); ?>">
                        <span class="icon"><i class="fas fa-city"></i></span>
                        <span class="caption">Cadastra Região</span>
                    </a>
                    </li>

                    <li class="item-header"></li>
                    <li>
                    	<a href="<?=$app->view('cadastra-distrito','painel'); ?>">
                        <span class="icon"><i class="fas fa-city"></i></span>
                        <span class="caption">Cadastra Distrito</span>
                    </a>
                    </li>

                    <li class="item-header"></li>
                    <li>
                    	<a href="<?=$app->view('cadastra-clube','painel'); ?>">
                        <span class="icon"><i class="fas fa-city"></i></span>
                        <span class="caption">Cadastra Clube</span>
                    </a>
                    </li>

                    <li class="item-header"></li>
                    <li>
                    	<a href="<?=$app->view('cadastra-unidade','painel'); ?>">
                        <span class="icon"><i class="fas fa-city"></i></span>
                        <span class="caption">Cadastra Unidade</span>
                    </a>
                    </li> 

                    <li class="item-header"></li>
                    <li>
                    	<a href="<?=$app->view('cadastra-campanha','painel'); ?>">
                        <span class="icon"><span class="mif-list2"></span></span>
                        <span class="caption">Cadastra Campanha</span>
                    </a>
                    </li> 

                    <li class="item-header"></li>
                    <li>
                    	<a href="<?=$app->view('cadastra-campori','painel'); ?>">
                        <span class="icon"><span class="mif-list2"></span></span>
                        <span class="caption">Cadastra Campori</span>
                    </a>
                    </li> 
                </ul>
            </li>
            <li class="item-header">Documentação</li>
            <li>
                <a href="<?=$app->view('politica-de-privacidade','painel'); ?>">
                    <span class="icon"><span class="mif-brightness-auto fg-red"></span></span>
                    <span class="caption">Politica de Privacidade</span>
                </a>
            </li>
            <li>
                <a href="<?=$app->view('termo-de-uso','painel'); ?>">
                    <span class="icon"><span class="mif-brightness-auto fg-red"></span></span>
                    <span class="caption">Termo de uso</span>
                </a>
            </li>

        </ul>

        <div class="w-100 text-center text-small data-box p-2 border-top bd-grayMouse" style="position: absolute; bottom: 0">
            <div>&copy; 2021 <a href="mailto:sergey@pimenov.com.ua" class="text-muted fg-white-hover no-decor">H7x</a></div>
            <div>Desenvolvido por  <a href="https://metroui.org.ua" class="text-muted fg-white-hover no-decor"> IN9 host</a></div>
        </div>
    </div>


<!---- side bar -->
    <div class="navview-content h-100">
        <div data-role="appbar" class="pos-absolute bg-darkCyan fg-white">

            <a href="#" class="app-bar-item d-block d-none-lg" id="paneToggle"><span class="mif-menu"></span></a>

            <div class="app-bar-container ml-auto">
                <div class="app-bar-container">
                    <a href="#" class="app-bar-item">
                        <img src="<?=Helper::avatar($_SESSION['usuario_imagem']); ?>" class="avatar">
                        <span class="ml-2 app-bar-name"><?=$_SESSION["usuario_apelido"]; ?></span>
                    </a>
                    <div class="user-block shadow-1" data-role="collapse" data-collapsed="true">
                        <div class="bg-darkCyan fg-white p-2 text-center">
                            <img src="<?=Helper::avatar($_SESSION['usuario_imagem']); ?>" class="avatar">
                            <div class="h4 mb-0"><?=$_SESSION["usuario_apelido"]; ?></div>
                            <div><?=$_SESSION["cargo_nome"]; ?></div>
                        </div>
                        <div class="bg-white d-flex flex-justify-between flex-equal-items p-2">
                            <button class="button flat-button">Vendas</button>
                            <button class="button flat-button">Livros</button>
                            <button class="button flat-button">Campanha</button>
                        </div>
                        <div class="bg-white d-flex flex-justify-between flex-equal-items p-2 bg-light">
                            <a href="<?=$app->view('perfil','painel'); ?>" class="button  info drop-shadow mr-1">Perfil</a>
                            <a  href="<?=$app->controller('sair','auth'); ?>" class="button alert drop-shadow ml-1">Sair</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-inner h-100" style="overflow-y: auto"><?php $template->invokeView(); ?></div>
    </div>
</div>