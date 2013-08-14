<div class="<?= $pluralVar; ?> form">
    
    <div class='row-fluid'>
        <div class='btn-group btn-navba' style='float:right'>
            <?= $this->Html->link(__d('cake', 'Voltar '), array('action' => 'index'), array('class' => 'btn')); ?>
        </div>
    </div>
    <div class="well">
        <h2>Ocorrência</h2>

        <dt>Nota:</dt>
        <dd><?=$this->data["Notum"]["valor"];?></dd>
        <br/>
        <dt>Tipo:</dt>
        <dd><?=$this->data["Notum"]["tipo"];?></dd>
        <br/>        
        <dt>Data:</dt>
        <dd><?=$this->data["Notum"]["data"];?></dd>
        <br/>        
    </div>

</div>
