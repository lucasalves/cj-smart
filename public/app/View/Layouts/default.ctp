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
        <script type="text/javascript">
            var ajaxurl = "<?php echo Router::url('/'); ?>";
        </script>
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $title_for_layout; ?></title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css(
                array(
                    'bootstrap.css',
                    'bootstrap-responsive.css',
                    'search.css',
                    'fullcalendar.print.css',
                    'fullcalendar.css',
                    'app/modal.css',
                    'aula/calendario.css',
                    'matricula.css',
                    'usuario',
                    'atividade',
                    'smoothness/jquery-ui-1.9.1.custom.css',
                )
        );


        echo $this->Html->script(
                array(
                    'jquery/jquery-2.0.2.js',
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
                    'bootstrap-typeahead',
                    'jquery-ui-1.10.2.custom.min.js',
                    'jquery-ui-1.9.1.custom',
                    'fullcalendar.min.js',
                    'app/app.js',
                    'app/modal.js',
                    'app/request.js',
                    'app/ajaxLoad.js',
                    'app/notify.js',
                    'vendor/highcharts/highcharts.js',
                    'vendor/highcharts/exporting.js',
                    'app/Chart.js',
                    'aula/calendario',
                    'aluno',
                    'Turma',
                    'Materia',
                    'usuario',
                    'grupoUsuario',
                    'aula',
                    'Atividade',
                    'Local'
                )
        );


        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <?= $this->element('topo', array('nome' => 'Curso')); ?>
        </div>
        <div class="container-fluid" id="main-corpo">
            <?= $this->element('menu', array('nome' => 'Curso')); ?>
        </div><!--/row-->
        <hr>
        <footer>

        </footer>



        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->


    </body>
    <?
     echo $this->Html->script(
                array(
                    'sistema'));
    ?>
</html>



<?// echo $this->element('sql_dump'); ?>
