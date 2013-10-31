<?php foreach($this->viewVars['turmas'] as $turma): ?>
	<option value="<?php echo $turma['materia']['id']; ?>"><?php echo $turma['materia']['nome']; ?></option>
<?php endforeach; ?>