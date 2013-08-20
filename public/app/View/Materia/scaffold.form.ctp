<?= $this->Form->create(); ?>
<div class="form">
    <?= $this->element('form_bar', array('nome' => 'Matéria')); ?>
    <div class="well">
        <legend>Matéria</legend>
        <?
        echo $this->Form->input('Materia.codigo', array('label' => 'Código', 'style'=>'width:50px;'));
        echo $this->Form->input('Materia.nome');
        
        ?>
    </div>
</div>
<?= $this->Form->end(); ?>


