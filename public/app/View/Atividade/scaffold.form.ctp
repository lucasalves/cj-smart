<div class="atividade-form form">
    <?php echo $this->Form->create(); ?>
    <div class='row-fluid'>
        <div class='btn-group btn-navba' style='float:right'>
            <input type = 'submit' value = 'Salvar Edição' id = 'Inserir' class='btn btn-success' />
        </div>
    </div>
    <div class="well">
        <legend>Atividade</legend>
        <?php echo $this->Form->input('Atividade.local_id');

            echo $this->Form->input('Atividade.data', $this->Aula->SolveDate($this->request, array('dateFormat' => 'DMY')));

            echo $this->Form->input('Atividade.turma_id', array(
                'label'      => 'Turma',
                'multiple'   => false
            ));

            echo $this->Form->input('Atividade.materia_id', array(
                'label' => 'Materia',
                'multiple'   => false
            ));

            echo $this->Form->input('Atividade.educador_id', array(
                'label'      => 'Educador Responsavel',
                'multiple'   => false
            ));
            
            
        ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>


