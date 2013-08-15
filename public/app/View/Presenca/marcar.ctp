<?= $this->Form->create(); ?>
<div class="form">
    <?= $this->element('form_bar', array('nome' => 'Ocorrencia')); ?>
    <div class="well">
        <legend>Ocorrência</legend>
        <?
        echo $this->Form->input('Ocorrencium.data');
        echo $this->Form->input('Ocorrencium.descricao', array('label' => 'Descrição'));
//        echo $this->Form->input('Aula.Aula', array('label' => 'Aula'));
//        echo $this->Form->input('Matricula.Matricula', array('label' => 'Matrícula'));
        ?>
    </div>
</div>
<?= $this->Form->end(); ?>


