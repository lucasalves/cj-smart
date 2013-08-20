<div class="<?= $pluralVar; ?> form">

    <div class='row-fluid'>
        <div class='btn-group btn-navba' style='float:right'>
            <?= $this->Html->link(__d('cake', 'Voltar '), array('action' => 'index'), array('class' => 'btn')); ?>
        </div>
    </div>
    <div class="well">
        <h2>Turma</h2>

        <dt>Nome:</dt>
        <dd><?= $this->data["Turma"]["nome"]; ?></dd>
        <br/>
        <dt>Período:</dt>
        <dd><?= $this->data["Turma"]["periodo"]; ?></dd>
        <br/>
        <dt>Data de Criação:</dt>
        <dd><?= $this->data["Turma"]["data_criacao"]; ?></dd>        
        <br/>
        <dt>Curso:</dt>
        <?= $this->data["Curso"]["nome"]; ?>

    </div>

</div>
