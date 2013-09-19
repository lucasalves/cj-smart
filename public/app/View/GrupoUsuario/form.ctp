<div class="grupo-usuario form">
    <div class="well">
        <legend>Grupo de Usuário</legend>    	
		<?php echo $this->Form->create(); ?>
        
        <div class="row-fluid">
        	<?php echo $this->Form->input('GrupoUsuario.nome'); ?>
        </div>

        <table class="table table-striped table-bordered">
        	<tr>
        		<th>Pagina</th>
        		<th>Visualizar</th>
        		<th>Editar</th>
        		<th>Apagar</th>
        	</tr>
        	<?php foreach($this->viewVars['permissions']['GrupoPermissoes'] as $permission): ?>
        		<tr>
        			<td><?php echo $this->Html->DescricaoCampo($permission['pagina']); ?></td>
        			<?php echo $this->Form->input('GrupoPermissao.pagina', array('type' => 'hidden', 'value' => $permission['pagina'])); ?>
        			<td><?php echo $this->Form->input('GrupoPermissao.visualizar', array('type' => 'checkbox', 'label' => false, 'value' => $permission['visualizar'], 'checked' => $permission['visualizar'])); ?></td>
        			<td><?php echo $this->Form->input('GrupoPermissao.editar', array('type' => 'checkbox', 'label' => false, 'value' => $permission['editar'], 'checked' => $permission['editar'])); ?></td>
        			<td><?php echo $this->Form->input('GrupoPermissao.apagar', array('type' => 'checkbox', 'label' => false, 'value' => $permission['apagar'], 'checked' => $permission['apagar'])); ?></td>
        		</tr>
        	<?php endforeach; ?>
        </table>
        <button class="save btn btn-success">Salvar</button>
		<?php echo $this->Form->end(); ?>
	</div>
</div>