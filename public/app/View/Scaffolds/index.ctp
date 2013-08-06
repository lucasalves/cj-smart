<?
    $descricoes = array("Educador" => "Educadores",
        "Curso"=>"Cursos",
        "Turma" => "Turmas",
        "Materia" => "Matérias",
        "Aluno" => "Alunos",
        "Matricula" => "Matrículas",
        "Aula" => "Aulas"
        );
?>
<div>
    <h3>
        <?
        if(array_key_exists($pluralHumanName, $descricoes)){
            echo $descricoes[$pluralHumanName];
        }else{
            echo $pluralHumanName;
        }?>
    </h3>
    <div class="row-fluid">
        <div  class="navbar-form pull-left main_pesquisa">
            <form action="<?php echo Router::url("/" . $this->request->params['controller'] . '/search'); ?>" method="GET">
                <input type="text" id="valorPesquisa" class="valorPesquisa" name="per"/>
                <input type="hidden" name="in" value="<?php echo $this->request->params['controller']; ?>"/>
                <button class="btn" id="search">Pesquisar <?php echo Inflector::humanize($this->request->params['controller']); ?></button>
            </form>
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
<!--                    <li><a href="#" id="excel"><img src="template/img/excel.png" /> Gerar Excel</a></li>
                    <li><a href="#" id="pdf"><img src="template/img/pdf.png" /> Gerar PDF</a></li>-->
                    <li><a href="#colunasExibir" role="button" data-toggle="modal">Exibir </a></li>
                    <li><a href="#colunasAgrupar" role="button" data-toggle="modal">Agrupar</a></li>
                </ul>
            </div>

            <?php echo $this->Html->link(__d('cake', 'Novo %s', $singularHumanName), array('action' => 'add'), array('class' => 'btn btn-success')); ?>

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
                    <?php foreach ($scaffoldFields as $_field): ?>
                        <th><?php echo $this->Paginator->sort($_field); ?></th>
                    <?php endforeach; ?>
                    <th><?php // echo __d('cake', 'Actions');  ?></th>
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
                    echo ' ' . $this->Form->postLink('', array('action' => 'delete', ${$singularVar}[$modelClass][$primaryKey]), array('class' => 'link link-deletar', 'title' => 'Excluir Registro'), __d('cake', "Deseja realmente excluir {$pluralHumanName}? "));
                    echo ' ' . $this->Html->link('', array('action' => 'edit', ${$singularVar}[$modelClass][$primaryKey]), array('class' => 'link link-editar', 'title' => 'Editar Registro'));

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

