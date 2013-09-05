<div>
    <h3>
        Finalizar Semestre
    </h3>
    <div class="row-fluid well">
        <div class='span3'>
            
        </div>
    </div>
    <ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#abertas" data-toggle="tab">Turmas Abertas</a></li>
        <li><a href="#encerradas" data-toggle="tab">Turmas Encerradas</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="abertas">
            <? foreach ($turmas_abertas as $turma): ?>
                <form action="<?php echo Router::url('/turma/finalizar'); ?>" method="GET">
                    <div class="media linha">
                        <a class="pull-left" href="#">
                            <img class="media-object"  src="<?php echo $this->Html->url("/img/icones/icone-livro.png"); ?>">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?= $turma["Turma"]["nome"] ?></h4>
                            Data de Criação: <?= $turma["Turma"]["data_criacao"] ?>
                            <input type="hidden" name="turma_id" value="<?= $turma["Turma"]["id"] ?>" />
                            <button class="btn btn-success btn-small">Finalizar Semestre</button>
                        </div >

                    </div>
                </form>
            <? endforeach; ?>
        </div>

        <div class="tab-pane fade" id="encerradas">
            <? foreach ($turmas_encerradas as $turma): ?>
                <form action="<?php echo Router::url('/turma/imprimir'); ?>" method="GET">
                    <div class="media linha">
                        <a class="pull-left" href="#">
                            <img class="media-object"  src="<?php echo $this->Html->url("/img/icones/icone-formando.png"); ?>">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?= $turma["Turma"]["nome"] ?></h4>
                            <p>
                                Data de Criação: <?= $turma["Turma"]["data_criacao"] ?>
                            </p>
                            <p>
                                Data de Encerramento: <?= $turma["Turma"]["data_encerramento"] ?>
                                <input type="hidden" name="turma_id" value="<?= $turma["Turma"]["id"] ?>" />
                                <button class="btn btn-info btn-small">Imprimir Certificados</button>
                            </p>
                        </div >

                    </div>
                </form>
            <? endforeach; ?>
        </div>

    </div>
</div>
