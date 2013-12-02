<?
$usuario = SessionComponent::read('Usuario.credenciais');
$tipo = $usuario['GrupoUsuario']['nome'];
?>


<div class="center home home-index">

    <? if ($aviso_falta > 0 and $tipo == "administrativo") { ?>
        <div class="row-fluid">
            <div class="alert alert-block">
                <h4>Aviso de Falta</h4>
                você possui <?= $aviso_falta ?>  aviso(s) de falta(s) 
                <a class="btn btn-small btn-navb btn-info " href="<?php echo Router::url("/aviso/avisoFalta"); ?>">Visualizar </a>

            </div>
        </div>

    <? } ?>
    <? if ($tipo == "coordenacao") { ?>
    <div class="row-fluid">
        
            <div class="span5">
                <a class="brand" href="<?php echo $this->Html->url("/turma/stats"); ?>">
                    <img src="<?php echo $this->Html->url("/img/ac-estatisticas.jpg"); ?>"/>
                </a>
            </div>
            <div class="span5">
                <a class="brand" href="<?php echo $this->Html->url("/aula"); ?>">
                    <img src="<?php echo $this->Html->url("/img/ac-calendario-aula.jpg"); ?>"/>
                </a>
            </div>
        
    </div>
    <br/>
    <? } ?>
    <? if ($tipo == "administrativo") { ?>
    <div class="row-fluid">
        <div class="span5">
            <a class="brand" href="<?php echo $this->Html->url("/matricula/add"); ?>">
                <img src="<?php echo $this->Html->url("/img/ac-nova-matricula.jpg"); ?>"/>
            </a>
        </div>
        <div class="span5">
            <a class="brand" href="<?php echo $this->Html->url("/diarioaula/registro"); ?>">
                <img src="<?php echo $this->Html->url("/img/ac-diario-aula.jpg"); ?>"/>
            </a>
        </div>
    </div>
    <?}?>
</div>
