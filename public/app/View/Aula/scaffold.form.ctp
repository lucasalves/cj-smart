<div class="aula-form">
    <?php echo $this->Form->create(); ?>
    <div class='row-fluid'>
        <div class='btn-group btn-navba' style='float:right'>
            <?= $this->Html->link(__d('cake', 'Voltar '), array('action' => 'index'), array('class' => 'btn')); ?>
            <input type = 'submit' value = 'Salvar Edição' id = 'Inserir' class='btn' />         
            <?//= $this->Form->postLink(__d('cake', 'Excluir'), array('action' => 'delete', $this->Form->value($modelClass . '.' . $primaryKey)), array('class' => 'btn btn-danger'), __d('cake', 'Deseja realmente excluir o registro # %s?', $this->Form->value($modelClass . '.' . $primaryKey))); ?>
        </div>
    </div>
    <div class="well">
        <legend>Aula</legend>
        <?php 
            echo $this->Form->input('Aula.local');
            $date = (!empty($this->request->query['date']) ? $this->request->query['date'] : '');

            echo $this->Form->input('Aula.data', array('selected' => date('Y-m-d', strtotime($date)), 'dateFormat' => 'DMY'));

            echo $this->Form->input('Turma.Turma', array(
                'label'      => 'Turma',
                'multiple'   => false
            ));

            echo $this->Form->input('Materia.Materia', array(
                'label' => 'Materia',
                'multiple'   => false
            ));
        ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>


