<?= $this->Form->create(); ?>
<div class="form">
    <?= $this->element('form_bar', array('nome' => 'Aula')); ?>
    
    <?= $this->element('calendario', array('nome' => 'Aula')); ?>
    
    <div class="well">
        <legend>Aula</legend>
        <?
//        
//        echo $this->Form->input('Aula.local');
//        echo $this->Form->input('Aula.data');
//        
//        echo $this->Form->input('Turma.Turma', array(
//            'label' => 'Turma',
//            'options' => $this->viewVars['turmas'],
//        ));
//        
//        echo $this->Form->input('Materia.Materia', array(
//            'label' => 'Matéria',
//            'options' => $this->viewVars['materias'],
//        ));
//        
//        echo $this->Form->input('Educador.Educador', array(
//            'label' => 'Educador',
//            'options' => $this->viewVars['educadores'],
//        ));
//        
        ?>
    </div>
</div>
        <?= $this->Form->end(); ?>


