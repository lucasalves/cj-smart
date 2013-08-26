<?= $this->Form->create(); ?>
<div class="form">
    <?= $this->element('form_bar', array('nome' => 'Aluno')); ?>
    <div class="well">
        <legend>Aluno</legend>
        <?
        echo $this->Form->input('Aluno.nome');
        echo $this->Form->input('Aluno.telefone');
        echo $this->Form->input('Aluno.data_nascimento', array('dateFormat' => 'DMY'));
        echo $this->Form->input('Aluno.responsavel', array('label' => 'Responsável'));
        echo $this->Form->input('Aluno.telefone_responsavel', array('label' => 'Telefone do Responsável'));
        echo $this->Form->input('Aluno.email_responsavel', array('label' => 'Email do Responsável'));
        echo $this->Form->input('Aluno.rg', $this->Html->inRequest('rg', array('label' => 'RG')));
        echo $this->Form->input('Aluno.cep', array('label' => 'CEP'));
        echo $this->Form->input('Aluno.logradouro', array('label' => 'Logradouro'));
        echo $this->Form->input('Aluno.numero', array('label' => 'Nº'));
        echo $this->Form->input('Aluno.bairro', array('label' => 'Bairro'));
        echo $this->Form->input('Aluno.cidade', array('label' => 'Cidade'));
        echo $this->Form->input('Aluno.email', array('label' => 'Email'));
        ?>
    </div>
</div>
<?= $this->Form->end(); ?>



