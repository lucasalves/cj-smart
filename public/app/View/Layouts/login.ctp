
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $title_for_layout; ?></title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css(
                array(
                    'bootstrap.css',
                    'login.css'
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
                    'bootstrap-typeahead'
                )
        );


        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <?php if ($error = $this->Session->flash()): ?>
            <div class="alert alert-error">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <?php echo $this->Form->create('Usuario', array( 'action' => 'login')); ?>
        <?php echo $this->Form->input('usuario',array('label'=>'Usuário')); ?>
        <?php echo $this->Form->input('senha', array('type' => 'password')); ?>
        <?php echo $this->Form->end('Entrar'); ?>
    </body>
</html>

