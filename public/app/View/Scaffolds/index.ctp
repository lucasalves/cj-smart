<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Scaffolds
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

<div>
    <h3>
        <?= $pluralHumanName; ?>
    </h3>
    <div class="row-fluid">
        <div  class="navbar-form pull-left main_pesquisa">
            <input type="text" id="valorPesquisa" class="valorPesquisa"  />
            <input type="button" value="Pesquisar" class="btn" id="html"/>
            <select id="qtdLinhas" class="control-group">
                <option>20</option>
                <option>50</option>
                <option>100</option>
                <option>200</option>
                <option>500</option>
                <option>1000</option>
            </select>
            <div class="btn-group">
                <!---a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                    + Opções
                    <span class="caret"></span>
                </a-->
                <ul class="dropdown-menu">
                    <!-- dropdown menu links -->
                    <li><a href="#" id="excel"><img src="template/img/excel.png" /> Gerar Excel</a></li>
                    <li><a href="#" id="pdf"><img src="template/img/pdf.png" /> Gerar PDF</a></li>
                    <li><a href="#colunasExibir" role="button" data-toggle="modal">Exibir </a></li>
                    <li><a href="#colunasAgrupar" role="button" data-toggle="modal">Agrupar</a></li>
                </ul>
            </div>

            <?php  echo $this->Html->link(__d('cake', 'Novo %s', $singularHumanName), array('action' => 'add'),array('class'=>'btn btn-success')); ?>

        </div>

    </div>


    <div class="row-fluid">
        
        
    <p class='totalLinhas'>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __d('cake', 'Página {:page} de {:pages}, exibindo {:current} registros do total {:count}, a partir do registro {:start}, até o {:end}')
        ));
        ?></p>
        <div id="mainRelatorio">
            <table cellpadding="0" cellspacing="0" class='table table-striped' id='relatorio'>
                <tr>
                    <th style="width:10px"></th>
                    <?php foreach ($scaffoldFields as $_field): ?>
                        <th><?php echo $this->Paginator->sort($_field); ?></th>
                    <?php endforeach; ?>
                    <th><?php // echo __d('cake', 'Actions'); ?></th>
                </tr>
                <?php
                foreach (${$pluralVar} as ${$singularVar}):
                    
                    echo '<tr>';
                    echo '<td>';
                    
                    echo $this->Html->link( '' , array('action' => 'view', ${$singularVar}[$modelClass][$primaryKey]), array('class'=>'link link-visualizar', 'title' => 'Visualizar Registro'));
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
                    echo ' ' . $this->Form->postLink('', array('action' => 'delete', ${$singularVar}[$modelClass][$primaryKey]), array('class'=>'link link-deletar', 'title' => 'Excluir Registro') , __d('cake', 'Are you sure you want to delete') . ' #' . ${$singularVar}[$modelClass][$primaryKey]);
                    echo ' ' . $this->Html->link('', array('action' => 'edit', ${$singularVar}[$modelClass][$primaryKey]), array('class'=>'link link-editar', 'title' => 'Editar Registro'));
                    
                    echo '</td>';
                    echo '</tr>';

                endforeach;
                ?>
            </table>
        </div>
    </div>

    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __d('cake', 'próxima'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__d('cake', 'anterior') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>


</div>

