<?= $this->Form->create(); ?>
<div class="form">
    <?= $this->element('form_bar', array('nome' => 'Curso')); ?>
    <div class="well">
        <legend>Educador</legend>
        <?
        
        echo $this->Form->input('Educador.nome');
        echo $this->Form->input('Educador.email', array('label' => 'E-mail'));
        echo $this->Form->input('Educador.curriculo', array('label' => 'Currículo'));
        echo $this->Form->input('Educador.rg',array('label'=>'RG'));


        ?>
    </div>
</div>
        <?= $this->Form->end(); ?>


