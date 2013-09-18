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

            <?php if(empty($this->data['Aluno']['rg'])): ?>
                <div class="row">
                    <div class="span4">
                        <?php echo $this->Form->input('rg', array('label' => 'RG', 'id' => 'rg')); ?>
                    </div>
                    <div class="span5 button-aluno">
                        <span title="Procurar Aluno" class="btn find-aluno btn-info">Adicionar Aluno</span>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?= $this->Form->end(); ?>

    <div id="botoes">
        <button class='btn btn-large btn-success matricula-create'>Matricular</button>
    </div>
    <div class="aluno"></div>


</div>
