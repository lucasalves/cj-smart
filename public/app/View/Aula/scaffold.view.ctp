<div class="aula-view form">
	<div class='row-fluid'>
	    <div class='btn-group btn-navba' style='float:right'>	      
	        <?php echo $this->Html->link('Editar', array('action' => 'edit', ${$singularVar}[$modelClass][$primaryKey]), array('class' => 'btn editar', 'title' => 'Editar Registro')); ?>
	        <?php echo $this->Form->postLink(
	        						__d('cake', 'Excluir'), 
	        						array(
	        							'action' => 'delete', 
	        							$this->Form->value($modelClass . '.' . $primaryKey)
	        						), 
	        						array('class' => 'btn btn-danger'), 
	        						__d('cake', 'Deseja realmente excluir o registro # %s?', $this->Form->value($modelClass . '.' . $primaryKey))
	        					);
	        ?>	        
		</div>
    </div>   
    <div class="well"> 
        <h2>Aula</h2>

        <dt>Local:</dt>
        <dd><?php echo $this->data["Aula"]["local"]; ?></dd>
        <br/>
        <dt>Data:</dt>
        <dd><?php echo $this->Time->format('d/m/Y', $this->data["Aula"]["data"]); ?></dd>
        <br/>
        <dt>Turma:</dt>
        <dd><?php echo $this->data["Turma"]["nome"]; ?></dd>        
        <br/>
        <dt>Matérias:</dt>
        <dd><?php echo $this->data["Materia"]["nome"];?></dd>
    </div>
</div>
