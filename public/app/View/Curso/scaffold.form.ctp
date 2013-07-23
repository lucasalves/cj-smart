<?= $this->Form->create(); ?>
<div class="form">
    <?= $this->element('form_bar', array('nome' => 'Curso')); ?>
    <div class="well">
        <legend>Curso</legend>
        <?
        
        echo $this->Form->input('Curso.nome');
        echo $this->Form->input('Curso.descricao', array('label' => 'Descrição'));
        echo $this->Form->input('Curso.duracao', array('label' => 'Duração', 'after' => ' meses', 'style' => 'width:40px'));

        echo $this->Form->input('Materia.Materia', array(
            'label' => 'Matérias',
            'options' => $this->viewVars['materias'],
            'multiple' => true,
        ));
        
        ?>
    </div>
</div>
        <?= $this->Form->end(); ?>


