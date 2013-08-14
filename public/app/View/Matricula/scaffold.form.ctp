<?= $this->Html->script(array('matricula.js','janela.js')); ?>
<?= $this->Form->create(array('id' => 'matricula')); ?>
<div class="form">
    <div class="well">
        <legend>Matricula</legend>
        <?
//        echo $this->Form->input('Turma.Turma', array(
//            'label' => 'Turma',
//            'options' => $this->viewVars['turmas'],
//            'multiple' => false,
//        ));

        echo $this->Form->input('rg', array('label' => 'RG', 'id' => 'rg'));
        echo $this->Form->input('Matricula.aluno_id', array('type' => 'hidden'));
        echo $this->Form->input('Matricula.codigo', array('type' => 'hidden', 'value' => '01'));
        ?>
        <div id="botoes"></div>

    </div>
</div>

 <?= $this->element('modal', array('titulo' => 'Cadastrar Aluno')); ?>


<?= $this->Form->end(); ?>

<script>    
    $("#matricula").on('change', function(e){
        e.preventDefault();
        // Instancia de Matricula
        objMatricula = new Matricula();
        
        // Valida
        objMatricula.verifica();
        
        // Atribui o Valor recebido ao campo
        console.log(objMatricula.aluno.id);
        $("#MatriculaAlunoId").val(objMatricula.aluno.id);
    });
</script>



