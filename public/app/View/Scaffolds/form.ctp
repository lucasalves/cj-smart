<?
print_r($scaffoldFields);

?>
<div class="<?= $pluralVar;?>form">
    <div class='row-fluid'>
        <div class='span2'>
            <?= $this->Form->create(); ?>
        </div>
        <div class='btn-group btn-navba' style='float:right'>
            <?= $this->Html->link(__d('cake', 'Voltar '), array('action' => 'index'), array('class' => 'btn')); ?>
            <input type = 'submit' value = 'Salvar Edição' id = 'Inserir' class='btn' />         
            <?//= $this->Form->postLink(__d('cake', 'Excluir'), array('action' => 'delete', $this->Form->value($modelClass . '.' . $primaryKey)), array('class' => 'btn btn-danger'), __d('cake', 'Deseja realmente excluir o registro # %s?', $this->Form->value($modelClass . '.' . $primaryKey))); ?>
        </div>
    </div>

    <div class="well">
        <?
        echo $this->Form->create();
        echo $this->Form->inputs($scaffoldFields, array('created', 'modified', 'updated'));
        //echo $this->Form->end( __d('cake', 'Salvar') );
        echo $this->Form->end();
        ?>
    </div>

</div>


