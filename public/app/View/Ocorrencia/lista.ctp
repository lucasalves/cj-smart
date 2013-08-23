
<? foreach ($ocorrencias as $ocorrencia): ?>

    <div class="media">
<!--        <a class="pull-left" href="#">
            <img class="media-object" data-src="holder.js/64x64">
        </a>-->
        <div class="media-body">
            <h4 class="media-heading"><?=$ocorrencia["nome"]?></h4>
            <?=$ocorrencia["descricao"]?>
            <span class="btn btn-success btn-small">Editar</span>
        </div>
    </div>
<? endforeach; ?>

