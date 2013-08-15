<?print_r($this->viewVars['alunos']);?>
<?php echo $this->Form->create(); ?>

<div>
    <h3>
        Presença em Aula
    </h3>
    <div class='row-fluid'>
        <div class='span4'>
            Esta Turma possui 4 alunos
        </div>
        <div class='btn-group btn-navba' style='float:right'>
            <?= $this->Html->link(__d('cake', 'Voltar '), array('action' => 'index'), array('class' => 'btn')); ?>
            <input type ='submit' value = 'Salvar' id = 'Inserir' class='btn' />         
        </div>
    </div>
    <div class='row-fluid'>
        <div class='span3'>
                   <?
        
        echo $this->Form->input('Turma.id', array(
            'label' => 'Turma',
            'options' => $this->viewVars['turmas'],
            'multiple' => false,
        ));
        ?>
        </div>
        <div class='span3'>
        <?
        
        
        
        echo $this->Form->input('Presenca.aula_id', array(
            'label' => 'Aula',
            'options' => $this->viewVars['aulas'],
            'multiple' => false,
        ));
        
        ?>
        </div>
    </div>
    <div class="row-fluid"> 

        <div id="mainRelatorio" class="well" >
            <table cellpadding="0" cellspacing="0" class='table table-striped' id='relatorio'>
                <tr>
                    <th>Matrícula</th>
                    <th>Nome</th>
                    <th>Faltou?</th>
                    <th>Ocorrência</th>
                </tr>
                <? foreach($this->viewVars['alunos'] as $aluno): ?>
                
                    <tr>
                        <td><?=$aluno["Aluno"]["id"]?></td>
                        <td><?=$aluno["Aluno"]["nome"]?></td>
                        <td><input type='checkbox' name='data[Presenca][matricula_id][]' value="1" /></td>
                        <td>
                    <input type ='button' value = 'Ocorrência' id = 'Ocorrencia' class='btn' /></td>
                    </tr>
                <? endforeach; ?>
            </table>
        </div>
    </div>
</div>

<?= $this->Form->end(); ?>