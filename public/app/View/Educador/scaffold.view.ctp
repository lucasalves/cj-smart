<div class="<?= $pluralVar; ?> form">
    
    <div class='row-fluid'>
        <div class='btn-group btn-navba' style='float:right'>
            <?= $this->Html->link(__d('cake', 'Voltar '), array('action' => 'index'), array('class' => 'btn')); ?>
        </div>
    </div>
    <div class="well">
        <h2>Educador</h2>

        <dt>Nome:</dt>
        <dd><?=$this->data["Educador"]["nome"];?></dd>
        <dt>E-mail:</dt>
        <dd><?=$this->data["Educador"]["email"];?></dd>
        <dt>Telefone:</dt>
        <dd><?=$this->data["Educador"]["telefone"];?></dd>
        <dt>RG:</dt>
        <dd><?=$this->data["Educador"]["rg"];?></dd>
        <dt>Matéria:</dt>
        <dd><?=$this->data["Materia"]["nome"];?></dd>
        <dt>Status:</dt>
        <dd><?=$this->data["Educador"]["status"];?></dd>
        <br>
        <dt>Endereço:</dt>
        <dd><?=$this->data["Educador"]["endereco"];?></dd>
        <dt>Número:</dt>
        <dd><?=$this->data["Educador"]["numero"];?></dd>
        <dt>Bairro:</dt>
        <dd><?=$this->data["Educador"]["bairro"];?></dd>
        <dt>Cidade:</dt>
        <dd><?=$this->data["Educador"]["cidade"];?></dd>
        <dt>CEP:</dt>
        <dd><?=$this->data["Educador"]["cep"];?></dd>

    </div>

</div>
