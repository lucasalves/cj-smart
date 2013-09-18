<div class="form aluno">
    <?= $this->Form->create(); ?>
    <?= $this->element('form_bar', array('nome' => 'Aluno')); ?>
    <div class="well">
        <legend>Aluno</legend>
        <? echo $this->Form->input('Aluno.id'); ?>
        <div class="row-fluid">
            <?
            echo $this->Form->input('Aluno.rg', $this->Html->inRequest('rg', array('label' => 'RG', 'div' => 'span3', 'style' => 'width:100px;')));
            echo $this->Form->input('Aluno.nome', array('div' => 'span4'));
            ?>
        </div>
        <div class="row-fluid">
            <?
            echo $this->Form->input('Aluno.data_nascimento', array('dateFormat' => 'DMY'));
            ?>
        </div>
        <div class="row-fluid">
            <?
            echo $this->Form->input('Aluno.telefone', array('div' => 'span4'));
            echo $this->Form->input('Aluno.email', array('label' => 'Email', 'div' => 'span4'));
            ?>
        </div>
        <hr/>
        <div class="row-fluid">
            <?
            echo $this->Form->input('Aluno.responsavel', array('label' => 'Responsável', 'div' => 'span4'));
            ?>
        </div>
        <div class="row-fluid">
            <?
            echo $this->Form->input('Aluno.telefone_responsavel', array('label' => 'Telefone do Responsável', 'div' => 'span4'));
            echo $this->Form->input('Aluno.email_responsavel', array('label' => 'Email do Responsável', 'div' => 'span4'));
            ?>
        </div>
        <hr/>
        <div class="row-fluid">
            <?
            echo $this->Form->input('Aluno.cep', array('label' => 'CEP', 'div' => 'span3', 'style' => 'width:100px;'));
            echo $this->Form->input('Aluno.logradouro', array('label' => 'Logradouro', 'div' => 'span4', 'style' => 'width:180px'));
            echo $this->Form->input('Aluno.numero', array('label' => 'Nº', 'div' => 'span1', 'style' => 'width:40px;'));
            ?>
        </div>
        <div class="row-fluid">
            <?
            echo $this->Form->input('Aluno.bairro', array('label' => 'Bairro', 'div' => 'span3', 'style' => 'width:100px;'));
            echo $this->Form->input('Aluno.cidade', array('label' => 'Cidade', 'div' => 'span4', 'style' => 'width:200px;'));
            ?>
        </div>
        <?= $this->Form->end(); ?>
    </div>