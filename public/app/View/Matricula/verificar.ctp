<?= $this->Form->create(); ?>
<div class="form">
    <?= $this->element('form_bar', array('nome' => 'Aluno')); ?>
    <div class="well">
        <legend>Aluno</legend>
        <?
        echo $this->Form->input('Aluno.nome');
        echo $this->Form->input('Aluno.rg', array('label' => 'RG'));
        echo $this->Form->input('Aluno.cpf', array('label' => 'CPF'));
        echo $this->Form->input('Aluno.logradouro', array('label' => 'Logradouro'));
        echo $this->Form->input('Aluno.cep', array('label' => 'CEP'));
        echo $this->Form->input('Aluno.responsavel', array('label' => 'Responsável'));
        
        ?>
    </div>
</div>
<?= $this->Form->end(); ?>


