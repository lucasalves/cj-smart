<?= $this->Form->create(); ?>
<div class="form">
    <?= $this->element('form_bar', array('nome' => 'Matéria')); ?>
    <div class="well">
        <legend>Matéria</legend>
        <?
        
        echo $this->Form->input('Materia.nome');
        echo $this->Form->input('Materia.codigo', array('label' => 'Código'));
        
        ?>
    </div>
</div>
<?= $this->Form->end(); ?>


