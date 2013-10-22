<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript">
            var ajaxurl = "<?php echo Router::url('/'); ?>";
        </script>

        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <style type="text/css">
            html { height: 100% }
            body { height: 100%; margin: 0; padding: 0 }
            #map_canvas { height: 100% }
        </style>

        <?
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
                    'usuario'
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
                    'fullcalendar.min.js',
                    'app/app.js',
                    'app/modal.js',
                    'app/request.js',
                    'app/ajaxLoad.js',
                    'app/notify.js',
                    'aula/calendario',
                    'aluno',
                    'usuario',
                    'grupoUsuario'
                )
        );

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>

        <script type="text/javascript">
            
            function loadScript() {
                var script = document.createElement("script");
                script.type = "text/javascript";
                script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyBNId0y6vDSRPEna8PMsoG3HVYoQMHji-M&sensor=true&callback=initialize";
                document.body.appendChild(script);
            }

            window.onload = loadScript;
        </script>
    </head>
    <body >
        <div class="navbar navbar-inverse navbar-fixed-top">
            <?= $this->element('topo', array('nome' => 'Curso')); ?>
        </div>

        <br/>
        <br/>
            <?= $this->fetch('content'); ?>
    </body>
</html>


