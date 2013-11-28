<div>
    <h3>
        Matrículas
    </h3>


    <div class="row-fluid">
        <div  class="navbar-form pull-left main_pesquisa well">
            <?
            echo $this->Search->create();
            echo $this->Search->input('filter1');
            ?>
            <button class="btn">Pesquisar</button>
            <?php echo $this->Html->link(__d('cake', 'Nova Matrícula'), array('action' => 'add'), array('class' => 'btn btn-success')); ?>

        </div>
    </div>

    <form></form>

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
                    <th><?=$this->Paginator->sort('codigo', 'Código')?></th>
                    <th><?=$this->Paginator->sort('nome', 'Nome')?></th>
                    <th><?=$this->Paginator->sort('turma', 'Turma')?></th>
                    <th></th>
                    <th></th>
                </tr>
                <? foreach ($matriculas as $matricula): ?>
                    <tr>
                        <td><?= $this->Html->link('', array('action' => 'view', $matricula["Matricula"]["id"]), array('class' => 'link link-visualizar', 'title' => 'Visualizar Registro')); ?></td>
                        <td><?= $matricula["Matricula"]["codigo"] ?></td>
                        <td><?= $matricula["Aluno"]["nome"] ?></td>
                        <td><?= $matricula["Turma"]["nome"] ?></td>
                        <td><?= $this->Html->link('', array('action' => 'edit', $matricula["Matricula"]["id"]), array('class' => 'link link-editar', 'title' => 'Editar Registro')); ?></td>
                        <td><?= $this->Form->postLink('', array('action' => 'delete', $matricula["Matricula"]["id"]), array('class' => 'link link-deletar', 'title' => 'Excluir Registro'), __d('cake', "Deseja realmente excluir esta Matrícula? "));?></td>
                                                
                    </tr>
                <? endforeach; ?>
            </table>
        </div>
    </div>

    <?= $this->element('paginacao'); ?>

</div>

