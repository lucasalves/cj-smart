<div class="<?= $pluralVar; ?> form" data-page="view">
    
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
    
        <table class="table">
            <tr>
                <td><b>RG</b></td>
                <td><?=$this->data["Aluno"]["rg"]?></td>
                <td><b>Nome</b></td>
                <td><?=$this->data["Aluno"]["nome"]?></td>
            </tr>
            <tr>
                <td><b>Data Nascimento</b></td>
                <td><?=$this->data["Aluno"]["data_nascimento"]?></td>
            </tr>
            <tr>
                <td><b>Telefone</b></td>
                <td><?=$this->data["Aluno"]["telefone"]?></td>
                <td><b>Email</b></td>
                <td><?=$this->data["Aluno"]["email"]?></td>
            </tr>
            <tr>
                <td><b>Responsável</b></td>
                <td><?=$this->data["Aluno"]["responsavel"]?></td>
            </tr>            
            <tr>
                <td><b>Telefone do Responsável</b></td>
                <td><?=$this->data["Aluno"]["telefone_responsavel"]?></td>
                <td><b>E-mail do Responsável</b></td>
                <td><?=$this->data["Aluno"]["email_responsavel"]?></td>
            </tr>   
            <tr>
                <td><b>Cep</b></td>
                <td><?=$this->data["Aluno"]["cep"]?></td>
                <td><b>Logradouro</b></td>
                <td><?=$this->data["Aluno"]["logradouro"]?></td>
                <td><b>Nº</b></td>
                <td><?=$this->data["Aluno"]["numero"]?></td>
            </tr> 
            <tr>
                <td><b>Bairro</b></td>
                <td><?=$this->data["Aluno"]["bairro"]?></td>
                <td><b>Cidade</b></td>
                <td><?=$this->data["Aluno"]["cidade"]?></td>

            </tr> 
        </table>
       </div> 
    <div class="well" style="display: none">
        
        
        <?php
        $i = 0;
        foreach ($scaffoldFields as $_field) {
            $isKey = false;
            if (!empty($associations['belongsTo'])) {
                foreach ($associations['belongsTo'] as $_alias => $_details) {
                    if ($_field === $_details['foreignKey']) {
                        $isKey = true;
                        echo "\t\t<dt>" . Inflector::humanize($this->Html->DescricaoCampo($_alias)) . "</dt>\n";
                        echo "\t\t<dd>\n\t\t\t";
                        echo $this->Html->link(
                                ${$singularVar}[$_alias][$_details['displayField']], array('plugin' => $_details['plugin'], 'controller' => $_details['controller'], 'action' => 'view', ${$singularVar}[$_alias][$_details['primaryKey']])
                        );
                        echo "\n\t\t&nbsp;</dd>\n\n";
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
    <h3>Análise das notas de <?php echo Inflector::humanize($this->data['Aluno']['nome']) ?></h3>
    <div class="stats" id="stats-aluno"></div>
</div>
