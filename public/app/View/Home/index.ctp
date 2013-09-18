<?if($aviso_falta >0){?>
<div class="center home home-index">
    <div class="row-fluid">
        <div class="alert alert-block">
            <h4>Aviso de Falta</h4>
            você possui <?=$aviso_falta?>  aviso(s) de falta(s) 
            <a class="btn btn-small btn-navb btn-info " href="<?php echo Router::url("/aviso/avisoFalta"); ?>">Visualizar </a>
            
        </div>
    </div>
</div>
<?}?>