<div class="matricula">
    <?= $this->Html->script(array('matricula.js', 'janela.js')); ?>
    <?= $this->Form->create(array('id' => 'matricula')); ?>
    <div class="form">
        <div class="well">
            <legend>Matricula</legend>

            <?php
                echo $this->Form->input('Matricula.aluno_id', array('type' => 'hidden'));
                echo $this->Form->input('Matricula.codigo', array('type' => 'hidden'));
                echo $this->Form->input('Matricula.data', array('type' => 'hidden', 'value' => date("Y-m-d")));
                echo $this->Form->input('Matricula.turma_id', array(
                    'label' => 'Turma',
                    'multiple' => false,
                    'empty'=>'Selecione uma Turma'
                
                ));
            ?>
            <?php if ($this->Form->isFieldError('Matricula.aluno_id')): ?>
                <?php echo $this->Form->error('Matricula.aluno_id'); ?>
            <?php endif; ?>
            
            <div class="row">
                <div class="span3">               
                    <?php echo $this->Form->input('rg', array('label' => 'RG', 'id' => 'rg')); ?>
                </div>
                <div class="span2 button-aluno">
                    <span title="Procurar Aluno" class="btn find-aluno">Adicionar Aluno</span>
                </div>
            </div>

            <div id="botoes"></div>

        </div>
    </div>
    <?= $this->Form->end(); ?>
</div>