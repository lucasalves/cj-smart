<?= $this->Form->create(); ?>
<div class="form">
    <?= $this->element('form_bar', array('nome' => 'Turma')); ?>
    <div class="well">
        <legend>Turma</legend>
        <?
        echo $this->Form->input('Turma.curso_id', array(
            'label' => 'Curso',
            'options' => $this->viewVars['cursos'],
        ));

        echo $this->Form->input('Turma.nome');


        echo $this->Form->input('Turma.periodo', array(
            'label' => 'Período',
            'options' => array('M' => 'Manhã', 'T' => 'Tarde', 'N' => 'Noite'))
        );

        echo $this->Form->input('Turma.data_criacao', $this->Aula->SolveDate($this->request, array('dateFormat' => 'DMY', 'label' => 'Data de Criação'))
        );
        ?>
    </div>
</div>
<?= $this->Form->end(); ?>


