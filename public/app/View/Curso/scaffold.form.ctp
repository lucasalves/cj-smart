<?= $this->Html->script(array('curso.js')); ?>
<?= $this->Form->create(); ?>   
<div class="form">
    <?= $this->element('form_bar', array('nome' => 'Curso')); ?>
    <div class="well">
        <legend>Curso</legend>

        <div class="row-fluid">


            <div class="span4">
                <?
                echo $this->Form->input('Curso.nome', array(
                ));

                echo $this->Form->input('Curso.descricao', array('label' => 'Descrição'));

                echo $this->Form->input('Curso.duracao', array('label' => 'Duração', 'after' => ' meses', 'style' => 'width:40px'));
                ?>
            </div>
            <div class="span5">
                <?
                echo $this->Form->input('Materia.Materia', array(
                    'label' => 'Matérias',
                    'options' => $this->viewVars['materias'],
                    'multiple' => true,
                ));

                echo "<span  class='btn btn-success' id='NovaMateria'>Nova Matéria</span>"
                ?>
                
                
                <div class="row-fluid">
                    <span>Android</span> <span class="badge">Excluir</span><br/>
                    <span>Inglês</span> <span class="badge">Excluir</span><br/>
                    <span>Android</span> <span class="badge">Excluir</span><br/>
                </div>
                
            </div>

        </div>

    </div>
</div>
<?= $this->Form->end(); ?>


