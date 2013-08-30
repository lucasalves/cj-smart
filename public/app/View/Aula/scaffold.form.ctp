<div class="aula-form form">
    <?php echo $this->Form->create(); ?>
    <div class='row-fluid'>
        <div class='btn-group btn-navba' style='float:right'>
            <input type = 'submit' value = 'Salvar Edição' id = 'Inserir' class='btn btn-success' />
        </div>
    </div>
    <div class="well">
        <legend>Aula</legend>
        <?php 
            echo $this->Form->input('Aula.local_id');

            echo $this->Form->input('Aula.data', $this->Aula->SolveDate($this->request, array('dateFormat' => 'DMY')));

            echo $this->Form->input('Aula.turma_id', array(
                'label'      => 'Turma',
                'multiple'   => false
            ));

            echo $this->Form->input('Aula.materia_id', array(
                'label' => 'Materia',
                'multiple'   => false
            ));
            
            
        ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>


