<?= $this->Form->create(); ?>
<div class="form">
    <?= $this->element('form_bar', array('nome' => 'Aviso')); ?>
    <div class="well">
        <legend>Aluno</legend>
        <?
        echo $this->Form->input('Aviso.descricao');
        echo $this->Form->input('Aviso.status', array(
            'options' => array('Aberto'=>'Aberto','Enviado'=>'Enviado', 'Arquivado'=>'Arquivado')
        ));
        echo $this->Form->input('Aviso.data_cadastro', array('dateFormat' => 'DMY'));
        echo $this->Form->input('Aviso.data_envio', array('dateFormat' => 'DMY'));
        echo $this->Form->hidden('Aviso.matricula_id');
        
        ?>
    </div>
</div>
<?= $this->Form->end(); ?>



