<?
$usuario = SessionComponent::read('Usuario.credenciais');
$tipo = $usuario['GrupoUsuario']['nome'];
?>

<? if ($aviso_falta > 0 and $tipo == "administrativo") { ?>
    <div class="center home home-index">
        <div class="row-fluid">
            <div class="alert alert-block">
                <h4>Aviso de Falta</h4>
                você possui <?= $aviso_falta ?>  aviso(s) de falta(s) 
                <a class="btn btn-small btn-navb btn-info " href="<?php echo Router::url("/aviso/avisoFalta"); ?>">Visualizar </a>

            </div>
        </div>
        
        <div class="row-fluid">
            <div class="span5">
                <a class="brand" href="<?php echo $this->Html->url("/"); ?>">
                    <img src="<?php echo $this->Html->url("/img/ac-estatisticas.jpg"); ?>"/>
                </a>
            </div>
        </div>
            
    </div>
<?
}?>