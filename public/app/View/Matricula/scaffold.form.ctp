<?= $this->Html->script(array('matricula.js','janela.js')); ?>
<?= $this->Form->create(array('id' => 'matricula')); ?>
<div class="form">
    <div class="well">
        <legend>Matricula</legend>
        <?php
            echo $this->Form->input('rg', array('label' => 'RG', 'id' => 'rg'));
            echo $this->Form->input('Matricula.aluno_id', array('type' => 'text'));
            echo $this->Form->input('Matricula.codigo', array('type' => 'text'));
        ?>
        <div id="botoes"></div>

    </div>
</div>

 <?= $this->element('modal', array('titulo' => 'Cadastrar Aluno')); ?>


<?= $this->Form->end(); ?>