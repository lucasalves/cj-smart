<?= $this->Form->create(); ?>
<div class="form">
    <?= $this->element('form_bar', array('nome' => 'Ocorrencia')); ?>
    <div class="well">
        <legend>Ocorrência</legend>
        <?
//        echo $this->Form->input('nome', $this->Html->inRequest('nome', array('disabled' => true)));
        echo $this->Form->input('Ocorrencia.matricula_id', $this->Html->inRequest('matricula_id', array('type' => 'hidden')));
        echo $this->Form->input('Ocorrencia.aula_id', $this->Html->inRequest('aula_id', array('type' => 'hidden')));
        echo $this->Form->input('Ocorrencia.gravidade', array('options' => array('B' => 'Baixa', 'A' => 'Alta')));
        echo $this->Form->input('Ocorrencia.descricao', array('label' => 'Descrição'));
        ?>
    </div>
</div>
<?= $this->Form->end(); ?>



