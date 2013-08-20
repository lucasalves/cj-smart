
<? // print_r($this->viewVars['alunos']);      ?>

<?= $this->Html->script(array('presenca.js','janela.js')); ?>

<?php echo $this->Form->create(null, array('url' => '/presenca/add')); ?>

<div>
    <h3>
        Registro do Diário de Aula
    </h3>
    <div class='row-fluid'>
        <div class='btn-group btn-navba' style='float:right'>
            <?= $this->Html->link(__d('cake', 'Voltar '), array('action' => 'index'), array('class' => 'btn')); ?>
            <input type ='submit' value = 'Salvar' id = 'Inserir' class='btn' />         
        </div>
    </div>
    <div class="row-fluid">
        <div class="well" >
            <div class='row-fluid'>
                <div class='span3'>
                    <?
                    echo $this->Form->input('Turma.id', array(
                        'label' => 'Turma',
                        'options' => $this->viewVars['turmas'],
                        'multiple' => false,
                        'empty' => 'Selecione a Turma',
                        'selected' => $turma_id
                    ));
                    ?>
                </div>
                <div class='span3'>
                    <?
                    
                        echo $this->Form->input('Presenca.aula_id', array(
                            'label' => 'Aula',
                            'options' => $this->viewVars['aulas'],
                            'multiple' => false,
                            'empty' => 'Selecione a Aula',
                            'selected' => $aula_id
                        ));
                    
                    ?>
                </div>
            </div>
            <div class="row-fluid" id="ListaAlunos"> 
            </div>
        </div>
    </div>
</div>

<script>
    $(document)
</script>
<?= $this->Form->end(); ?>