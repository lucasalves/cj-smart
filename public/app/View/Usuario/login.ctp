<?php if($error = $this->Session->flash()): ?>
	<div class="alert alert-error">
		<?php echo $error; ?>
	</div>
<?php endif; ?>
<?php echo $this->Form->create('Usuario', array('action' => 'login')); ?>
<?php echo $this->Form->input('usuario'); ?>
<?php echo $this->Form->input('senha', array('type' => 'password')); ?>
<?php echo $this->Form->end('Entrar'); ?>