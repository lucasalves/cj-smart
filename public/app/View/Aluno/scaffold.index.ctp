<div>
    <h3>
        <?= $this->Html->CampoPlural($pluralHumanName); ?>
    </h3>

    <div class="row-fluid">
        <div  class="navbar-form pull-left main_pesquisa">
            <form action="<?php echo Router::url("/" . $pluralHumanName . '/search'); ?>" method="GET">
                <input type="text" id="valorPesquisa" class="valorPesquisa" name="per" value=""/>
                <input type="hidden" name="in" value="<?php echo $pluralHumanName ?>"/>
                <button class="btn" id="search">Pesquisar  <?php echo Inflector::humanize($pluralHumanName); ?></button>
                <select id="qtdLinhas" class="control-group">
                    <option>20</option>
                    <option>50</option>
                    <option>100</option>
                    <option>200</option>
                    <option>500</option>
                    <option>1000</option>
                </select> 
                <div class="btn-group">
                    <!--a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                        + Opções
                        <span class="caret"></span>
                    </a-->
                    <ul class="dropdown-menu">
                        <!-- dropdown menu links -->
    <!--                    <li><a href="#" id="excel"><img src="template/img/excel.png" /> Gerar Excel</a></li>
                        <li><a href="#" id="pdf"><img src="template/img/pdf.png" /> Gerar PDF</a></li>-->
                        <li><a href="#colunasExibir" role="button" data-toggle="modal">Exibir </a></li>
                        <li><a href="#colunasAgrupar" role="button" data-toggle="modal">Agrupar</a></li>
                    </ul>
                </div>
            </form>
        </div>
    </div>

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
                    <?php foreach ($this->Html->displayFiels($this, $scaffoldFields) as $_field): ?>
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
                    foreach ($this->Html->displayFiels($this, $scaffoldFields) as $_field) {
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