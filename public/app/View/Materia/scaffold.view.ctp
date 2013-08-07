<div class="<?= $pluralVar; ?> form">
    
    <div class='row-fluid'>
        <div class='btn-group btn-navba' style='float:right'>
            <?= $this->Html->link(__d('cake', 'Voltar '), array('action' => 'index'), array('class' => 'btn')); ?>
        </div>
    </div>
    <div class="well">
        <h2>Matéria</h2>

        <dt>Código:</dt>
        <dd><?=$this->data["Materium"]["codigo"];?></dd>
        <br/>
        
        <dt>Nome:</dt>
        <dd><?=$this->data["Materium"]["nome"];?></dd>
        <br/>
        

    </div>

</div>
