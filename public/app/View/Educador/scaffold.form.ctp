<?= $this->Form->create(); ?>
<div class="form">
    <?= $this->element('form_bar', array('nome' => 'Curso')); ?>
    <div class="well">
        <legend>Educador</legend>
        <?
        
        echo $this->Form->input('Educador.nome');
        echo $this->Form->input('Educador.email', array('label' => 'E-mail'));
        echo $this->Form->input('Educador.curriculo', array('label' => 'Currículo'));
        echo $this->Form->input('Educador.rg',array('label'=>'RG'));
        echo $this->Form->input('Educador.cep',array('label'=>'CEP'));
        echo $this->Form->input('Educador.endereco',array('label'=>'Endereço'));
        echo $this->Form->input('Educador.numero',array('label'=>'Nº'));
        echo $this->Form->input('Educador.bairro',array('label'=>'Bairro'));
        echo $this->Form->input('Educador.cidade',array('label'=>'Cidade'));
        echo $this->Form->input('Educador.materia_id',array('label'=>'Matéria'));


        ?>
    </div>
</div>
        <?= $this->Form->end(); ?>


