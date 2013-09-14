<div class="<?= $pluralVar; ?> form">
    
    <div class='row-fluid'>
        <div class='btn-group btn-navba' style='float:right'>
            <?= $this->Html->link(__d('cake', 'Voltar '), array('action' => 'index'), array('class' => 'btn')); ?>
        </div>
    </div>
    <div class="well">
        <h2>Aluno</h2>

        <dt>Nome:</dt>
        <dd><?=$this->data["Aluno"]["nome"];?></dd>
        <dt>Rg:</dt>
        <dd><?=$this->data["Aluno"]["rg"];?></dd>
        <dt>Data Nascimento:</dt>
        <dd><?=$this->data["Aluno"]["data_nascimento"];?></dd>
        <dt>Logradouro:</dt>
        <dd><?=$this->data["Aluno"]["logradouro"];?></dd>
        <dt>Telefone:</dt>
        <dd><?=$this->data["Aluno"]["telefone"];?></dd>
        <dt>CEP:</dt>
        <dd><?=$this->data["Aluno"]["cep"];?></dd>
        
        <dt>Responsável:</dt>
        <dd><?=$this->data["Aluno"]["responsavel"];?></dd>
        <dt>Telefone do Reponsável:</dt>
        <dd><?=$this->data["Aluno"]["telefone_responsavel"];?></dd>
    </div>

</div>
