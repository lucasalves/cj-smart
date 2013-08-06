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
        <br/>
        <dt>Descrição:</dt>
        <dd><?=$this->data["Curso"]["descricao"];?></dd>
        <br/>
        <dt>Duração:</dt>
        <dd><?=$this->data["Curso"]["duracao"];?> meses</dd>        
        <br/>
        <dt>Matérias:</dt>
        <?
        foreach ($this->data["Materia"] as $materia):
            echo "<dd>{$materia["nome"]}</dd>";
        endforeach;
        ?>
        
    </div>

</div>
