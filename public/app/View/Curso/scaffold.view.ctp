<div class="<?= $pluralVar; ?> form">
    
    <div class='row-fluid'>
        <div class='btn-group btn-navba' style='float:right'>
            <?= $this->Html->link(__d('cake', 'Voltar '), array('action' => 'index'), array('class' => 'btn')); ?>
        </div>
    </div>
    <div class="well">
        <h2>Curso</h2>

        <dt>Nome:</dt>
        <dd><?=$this->data["Curso"]["nome"];?></dd>
        <dt>Descrição:</dt>
        <dd><?=$this->data["Curso"]["descricao"];?></dd>
        <dt>Duração:</dt>
        <dd><?=$this->data["Curso"]["duracao"];?> meses</dd>        
        <dt>Matérias:</dt>
        <ol>
        <?
        foreach ($this->data["Materia"] as $materia):
            echo "<li><dd>{$materia["nome"]}</dd></li>";
        endforeach;
        ?>
        </ol>
    </div>

</div>
