<?
$usuario = SessionComponent::read('Usuario.credenciais');
$nome = $usuario['Usuario']['nome'];
$tipo = $usuario['GrupoUsuario']['nome'];
?>
<div class="navbar-inner">
    <div class="container-fluid">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="brand" href="<?php echo $this->Html->url("/"); ?>"><img src="<?php echo $this->Html->url("/img/cj-smart-logo.png"); ?>"/></a>
        <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
                Seja Bem-Vindo <?=$tipo?>, <b><?=$nome?></b>
                
               
                <!--a href="deslogar.php" class="navbar-link">Trocar Senha</a>
                <a href="deslogar.php" class="navbar-link">Sair</a>
            </p>
                <!--            <ul class="nav">
                                <li class="active"><a href="#">Home</a></li>
                                <li><a href="#about">About</a></li>
                                <li><a href="#contact">Contact</a></li>
                                <li><a href="#"><img src="template/img/config.png" /></li></a>
                                <li><a href="#"><img src="template/img/help.png" /></li></a>
                                <li><a href="#"><img src="template/img/user.png" /></li></a>
                            </ul>-->
        </div><!--/.nav-collapse -->
    </div>
</div>