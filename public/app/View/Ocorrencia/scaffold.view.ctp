<div class="<?= $pluralVar; ?> form">
    
    <div class='row-fluid'>
        <div class='btn-group btn-navba' style='float:right'>
            <?= $this->Html->link(__d('cake', 'Voltar '), array('action' => 'index'), array('class' => 'btn')); ?>
        </div>
    </div>
    <div class="well">
        <h2>Ocorrência</h2>

        <dt>Data:</dt>
        <dd><?=$this->data["Ocorrencium"]["data"];?></dd>
        <br/>
        <dt>Descrição:</dt>
        <dd><?=$this->data["Ocorrencium"]["descricao"];?></dd>
        <br/>        
    </div>

</div>
