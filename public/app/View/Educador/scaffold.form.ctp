<?= $this->Form->create(); ?>
<div class="form">
    <?= $this->element('form_bar', array('nome' => 'Curso')); ?>
    <div class="well">
        <legend>Educador</legend>
        <div class="row-fluid">

            <?
            echo $this->Form->input('Educador.nome', array(
                'div' => 'span4'
            ));
            echo $this->Form->input('Educador.rg', array(
                'label' => 'RG',
                'div' => 'span2',
                'style' => 'width:100px;'
            ));
            ?>
        </div>
        <div class="row-fluid">
            <?
            echo $this->Form->input('Educador.telefone', array(
                'label' => 'Telefone',
                'div' => 'span4',
                'maxlength' => 15
            ));
            echo $this->Form->input('Educador.email', array(
                'label' => 'E-mail',
                'div' => 'span4'));
            ?>
        </div>
        <div class="row-fluid">
            <?
            echo $this->Form->input('Educador.endereco', array(
                'label' => 'Endereço',
                'div' => 'span4'
            ));

            echo $this->Form->input('Educador.numero', array(
                'label' => 'Nº',
                'div' => 'span2',
                'style' => 'width:80px;'));

            echo $this->Form->input('Educador.bairro', array(
                'label' => 'Bairro',
                'div' => 'span4'));
            ?>
        </div>
        <div class="row-fluid">
            <?
            echo $this->Form->input('Educador.cep', array(
                'label' => 'CEP',
                'div' => 'span2',
                'style' => 'width:100px;'
            ));

            echo $this->Form->input('Educador.cidade', array(
                'label' => 'Cidade',
                'div' => 'span4'
            ));
            ?>


        </div>
        <div class="row-fluid">
            <?
            echo $this->Form->input('Educador.materia_id', array(
                'label' => 'Matéria',
                'div' => 'span4'
            ));
            echo $this->Form->input('Educador.status', array(
                'selected' => $this->data["Educador"]["status"],
                'options' => array('A' => 'Ativado', 'D' => 'Desativado'),
                'empty' => false,
                'label' => 'Status',
                'div' => 'span2'));
            ?>
        </div>
        <div class="row-fluid">
            <?
            ?>
        </div>

    </div>
</div>
<?= $this->Form->end(); ?>


