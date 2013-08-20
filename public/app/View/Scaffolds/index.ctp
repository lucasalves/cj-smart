<div>
    <h3>
        <?= $this->Html->CampoPlural($pluralHumanName); ?>
    </h3>

    <?= $this->element('barra_pesquisa', array('valor' => null, 'controller' => $pluralHumanName)); ?>

    <div class="row-fluid">


        <p class='totalLinhas'>
            <?php
            echo $this->Paginator->counter(array(
                'format' => __d('cake', 'Página {:page} de {:pages}, exibindo {:current} registros do total {:count}, a partir do registro {:start}, até o {:end}')
            ));
            ?>
        </p>
        <div id="mainRelatorio" >
            <table cellpadding="0" cellspacing="0" class='table table-striped' id='relatorio'>
                <tr>
                    <th style="width:10px"></th>
                    <?php foreach ($scaffoldFields as $_field): ?>
                        <th><?php echo $this->Paginator->sort($_field, $this->Html->DescricaoCampo($_field)); ?></th>
                    <?php endforeach; ?>
                    <th><?php // echo __d('cake', 'Actions');        ?></th>
                </tr>
                <?php
                foreach (${$pluralVar} as ${$singularVar}):

                    echo '<tr>';
                    echo '<td>';

                    echo $this->Html->link('', array('action' => 'view', ${$singularVar}[$modelClass][$primaryKey]), array('class' => 'link link-visualizar', 'title' => 'Visualizar Registro'));
                    echo '</td>';
                    foreach ($scaffoldFields as $_field) {
                        $isKey = false;
                        if (!empty($associations['belongsTo'])) {
                            foreach ($associations['belongsTo'] as $_alias => $_details) {
                                if ($_field === $_details['foreignKey']) {
                                    $isKey = true;
                                    echo '<td>' . $this->Html->link(${$singularVar}[$_alias][$_details['displayField']], array('controller' => $_details['controller'], 'action' => 'view', ${$singularVar}[$_alias][$_details['primaryKey']])) . '</td>';
                                    break;
                                }
                            }
                        }
                        if ($isKey !== true) {
                            echo '<td>' . h(${$singularVar}[$modelClass][$_field]) . '</td>';
                        }
                    }


                    echo '<td class="actions">';

                    if (!in_array($modelClass, array('Educador'))) {
                        echo ' ' . $this->Form->postLink('', array('action' => 'delete', ${$singularVar}[$modelClass][$primaryKey]), array('class' => 'link link-deletar', 'title' => 'Excluir Registro'), __d('cake', "Deseja realmente excluir {$pluralHumanName}? "));
                    }
                    echo ' ' . $this->Html->link('', array('action' => 'edit', ${$singularVar}[$modelClass][$primaryKey]), array('class' => 'link link-editar', 'title' => 'Editar Registro'));

                    echo '</td>';
                    echo '</tr>';

                endforeach;
                ?>
            </table>
        </div>
    </div>

    <?= $this->element('paginacao'); ?>



</div>

