<?= $this->Form->create(); ?>
<div class="form">
    <?= $this->element('form_bar', array('nome' => 'Nota')); ?>
    <div class="well">
        <legend>Nota</legend>
        <?
        
        echo $this->Form->input('Nota.valor');
        echo $this->Form->input('Nota.tipo', array('label' => 'Tipo'));
        echo $this->Form->input('Nota.data');
        
        
         echo $this->Form->input('Nota.materia_id', array(
                'label' => 'Materia',
                'multiple'   => false
            ));
                
         echo $this->Form->input('Nota.matricula_id', array(
                'label' => 'Matricula',
                'multiple'   => false
            ));

         
        ?>
    </div>
</div>
<?= $this->Form->end(); ?>


