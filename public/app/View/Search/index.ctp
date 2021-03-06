<?
$controller = $this->request->params['controller'];
$valor = $this->params->query['per'];
?>

<div>
    <h3>
        <?= $this->Html->CampoPlural($controller); ?>
    </h3>

    <?= $this->element('barra_pesquisa', array('valor' => $valor, 'controller' => $controller)); ?>

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
                    <?php foreach ($this->Html->displayFiels($this, $data['fields']) as $field): ?>
                        <th><?php echo $this->Paginator->sort($field); ?></th>
                    <?php endforeach; ?>
                    <th></th>
                </tr>
                <?php foreach ($data['rows'] as $row): ?>
                    <?php $row = $row[Inflector::humanize($this->request->params['controller'])]; ?>
                    <tr>
                        <td><?php echo $this->Html->link('', array('action' => 'view', $row['id']), array('class' => 'link link-visualizar', 'title' => 'Visualizar Registro')); ?>
                        </td>
                        <?php foreach ($this->Html->displayFiels($this, $data['fields']) as $field): ?>
                            <td><?php echo $row[$field]; ?></td>
                        <?php endforeach; ?>

                        <td class="actions">
                            <?php echo ' ' . $this->Form->postLink('', array('action' => 'delete', $row['id']), array('class' => 'link link-deletar', 'title' => 'Excluir Registro'), __d('cake', "Deseja realmente excluir este" . Inflector::humanize($this->request->params['controller']) . "? ")); ?>
                            <?php echo ' ' . $this->Html->link('', array('action' => 'edit', $row['id']), array('class' => 'link link-editar', 'title' => 'Editar Registro')); ?>
                        </td>
                    <?php endforeach; ?>
            </table>
        </div>
    </div>

   <?= $this->element('paginacao'); ?>

</div>