<div class="grupo-usuario form">
    <div class="well">
        <legend>Grupo de Usuário</legend>    	
		<?php echo $this->Form->create('create', array('id' => 'grupo-usuario-create', 'url' => $this->Html->url(array('controller' => 'GrupoUsuario', 'action' => 'create')))); ?>
        
        <div class="row-fluid">
        	<?php echo $this->Form->input('GrupoUsuario.nome', array('label' => 'Pagina')); ?>
        </div>
    	<?php foreach($this->viewVars['permissions']['GrupoPermissoes'] as $permission): ?>
            <?php
                echo $this->Form->input('GrupoPermissao.' . $permission['pagina'], array(
                                                                                    'type' => 'select',
                                                                                    'multiple' => 'checkbox',
                                                                                    'options' => array(
                                                                                        'visualizar' => 'Visualizar',
                                                                                        'editar'     => 'Editar',
                                                                                        'apagar'     => 'Apagar'
                                                                                    )
                                                                                ));

            ?>
    	<?php endforeach; ?>
        <button class="save btn btn-success">Salvar</button>
		<?php echo $this->Form->end(); ?>
	</div>
</div>