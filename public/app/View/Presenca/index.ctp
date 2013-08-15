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
        <?
         echo $this->Form->input('Presenca.aula_id', array(
                'label' => 'Aula',
                'multiple'   => false
            ));
        ?>
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
                <? for ($i = 0; $i <= 40; $i++): ?>
                    <tr>
                        <td>0001</td>
                        <td>Bruno Leonardo</td>
                        <td><input type='checkbox' /></td>
                        <td><input type ='button' value = 'Ocorrência' id = 'Ocorrencia' class='btn' /></td>
                    </tr>
                <? endfor; ?>
            </table>
        </div>
    </div>
</div>

<?= $this->Form->end(); ?>