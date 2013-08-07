<?= $this->Form->create(); ?>
<div class="form">
    <?= $this->element('form_bar', array('nome' => 'Turma')); ?>
    <div class="well">
        <legend>Turma</legend>
        <?
        echo $this->Form->input('Turma.nome');

        echo $this->Form->input('Turma.periodo', array(
            'label' => 'Período', 
            'options' => array(1 => 'Manhã', 2 => 'Tarde', 3 => 'Noite')));

        echo $this->Form->input('Turma.curso_id', array(
            'label' => 'Curso',
            'options' => $this->viewVars['cursos'],
        ));
        ?>
    </div>
</div>
<?= $this->Form->end(); ?>


