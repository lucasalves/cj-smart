<?= $this->Form->create(); ?>
<div class="form">
    <?= $this->element('form_bar', array('nome' => 'Turma')); ?>
    <div class="well">
        <legend>Turma</legend>
        <?
        
        echo $this->Form->input('Turma.nome');
        echo $this->Form->input('Turma.periodo', array('label' => 'Período'));
        echo $this->Form->input('Turma.data_criacao');

        echo $this->Form->input('Curso.Curso', array(
            'label' => 'Curso',
            'options' => $this->viewVars['cursos'],
        ));
        
        ?>
    </div>
</div>
        <?= $this->Form->end(); ?>


