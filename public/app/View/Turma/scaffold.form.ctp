<?= $this->Form->create(); ?>
<div class="form">
    <?= $this->element('form_bar', array('nome' => 'Turma')); ?>
    <div class="well">
        <legend>Turma</legend>
        <?
        echo $this->Form->input('Turma.nome');
        
        if(count($this->data) > 0){
            $periodo = $this->data["Turma"]["periodo"];
        }else{
            $periodo = null;
        }
        echo $this->Form->input('Turma.periodo', array(
            'label' => 'Período', 
            'options' => array('M'=>'Manhã','T'=>'Tarde','N'=>'Noite'),
            'selected'=> $periodo)
                );
        
        echo $this->Form->input('Turma.curso_id', array(
            'label' => 'Curso',
            'options' => $this->viewVars['cursos'],
        ));
        
        echo $this->Form->input('Turma.data_criacao', array(
            'label' => 'Data de Criação'
        ));        
        ?>
    </div>
</div>
<?= $this->Form->end(); ?>


