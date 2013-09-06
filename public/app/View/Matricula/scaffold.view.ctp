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
        
        <dt>Nome:</dt>
        <dd><?=$this->data["Aluno"]["rg"];?></dd>
        
        <dt>Logradouro:</dt>
        <dd><?=$this->data["Aluno"]["logradouro"];?></dd>
        
        <dt>CEP:</dt>
        <dd><?=$this->data["Aluno"]["cep"];?></dd>
        
        <dt>Responsável:</dt>
        <dd><?=$this->data["Aluno"]["responsavel"];?></dd>
        <br/>
    </div>

</div>
