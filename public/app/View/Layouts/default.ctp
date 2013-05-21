<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $title_for_layout; ?></title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css(
                array(
                    'bootstrap.css')
        );


        echo $this->Html->script(
                array(
                    //  'jquery/jquery-1.9.1.min.js',
                    'bootstrap-transition',
                    'bootstrap-alert',
                    'bootstrap-modal',
                    'bootstrap-dropdown',
                    'bootstrap-scrollspy',
                    'bootstrap-tab',
                    'bootstrap-tooltip',
                    'bootstrap-popover',
                    'bootstrap-button',
                    'bootstrap-collapse',
                    'bootstrap-carousel',
                    'bootstrap-typeahead'
                )
        );


        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="#"> <img src="img/cj-smart-logo.png"/></a>
                    <div class="nav-collapse collapse">
                        <p class="navbar-text pull-right">
                            Seja Bem-Vinda,Coordenadora <b>Magali F.</b>
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
        </div>
        <br><br><br>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span2">
                    <div class="sidebar-nav well">
                        <ul class='nav nav-list' >
                            <li class='nav-header'>Menu</li>
                            <li><a href="<?php echo Router::url("/curso"); ?>">Cursos</a></li>
                            <li><a href="<?php echo Router::url("/aluno"); ?>">Alunos</a></li>
                            <li><a href="<?php echo Router::url("/matricula"); ?>">Matrícula</a></li>
                            <li><a href="<?php echo Router::url("/materia"); ?>">Matérias</a></li>

                        </ul>
                    </div><!--/.well -->
                </div><!--/span-->
                <div class="span10" id="corpo">
                    <?php echo $this->Session->flash(); ?>			
                    <?php echo $this->fetch('content'); ?>
                </div>
            </div><!--/span-->
        </div><!--/row-->
        <hr>
        <footer>

        </footer>



        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->


    </body>
</html>
