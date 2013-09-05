<div class="row-fluid painel-impressao">
    <div class='row-fluid'>
        <div class='btn-group btn-navba' style='float:right'>
            <?= $this->Html->link(__d('cake', 'Voltar '), array('action' => 'finalizarSemestre'), array('class' => 'btn')); ?>
        </div>
    </div>
    <img src="<?php echo $this->Html->url("/img/carregando.gif"); ?>"/>
</div>