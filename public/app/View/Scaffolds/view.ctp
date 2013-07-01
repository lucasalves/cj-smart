<div class="<?= $pluralVar; ?> form">
    
    <div class='row-fluid'>
        <div class='span2'>
            <?= $this->Form->create(); ?>
        </div>
        <div class='btn-group btn-navba' style='float:right'>
            <?= $this->Html->link(__d('cake', 'Voltar '), array('action' => 'index'), array('class' => 'btn')); ?>
            <? //= $this->Form->postLink(__d('cake', 'Excluir'), array('action' => 'delete', $this->Form->value($modelClass . '.' . $primaryKey)), array('class' => 'btn btn-danger'), __d('cake', 'Deseja realmente excluir o registro # %s?', $this->Form->value($modelClass . '.' . $primaryKey))); ?>
        </div>
    </div>

        
    <div class="well">
        
        <h2><?php echo __d('cake', $singularHumanName); ?></h2>
        <?php
        $i = 0;
        foreach ($scaffoldFields as $_field) {
            $isKey = false;
            if (!empty($associations['belongsTo'])) {
                foreach ($associations['belongsTo'] as $_alias => $_details) {
                    if ($_field === $_details['foreignKey']) {
                        $isKey = true;
                        echo "\t\t<dt>" . Inflector::humanize($_alias) . "</dt>\n";
                        echo "\t\t<dd>\n\t\t\t";
                        echo $this->Html->link(
                                ${$singularVar}[$_alias][$_details['displayField']], array('plugin' => $_details['plugin'], 'controller' => $_details['controller'], 'action' => 'view', ${$singularVar}[$_alias][$_details['primaryKey']])
                        );
                        echo "\n\t\t&nbsp;</dd>\n";
                        break;
                    }
                }
            }
            if ($isKey !== true) {
                echo "\t\t<dt>" . Inflector::humanize($_field) . "</dt>\n";
                echo "\t\t<dd>" . h(${$singularVar}[$modelClass][$_field]) . "&nbsp;</dd>\n";
            }
        }
        ?>
    </div>

</div>
