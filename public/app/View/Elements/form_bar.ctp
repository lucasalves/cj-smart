    <div class='row-fluid'>
        <div class='span2'>
            <?php echo $this->Form->create(); ?>
        </div>
        <div class='btn-group btn-navba' style='float:right'>
            <?= $this->Html->link(__d('cake', 'Voltar '), array('action' => 'index'), array('class' => 'btn')); ?>
            <input type = 'submit' value = 'Salvar' id = 'Inserir' class='btn' />         
        </div>
    </div>