<div>
    <h3>
        Boletins
    </h3>
    <div class="row-fluid">
        <div  class="navbar-form pull-left main_pesquisa well">
            <form action="<?php echo Router::url('/boletim/index '); ?>" method="GET">
                <input type="text" name="mes" value="<? ?>" />
                <input type="text" name="ano" value="<? ?>" />
                <button class="btn" id="search">Buscar Matrículas</button>
            </form>
        </div>
    </div>

    <div class="row-fluid">
        <p class='totalLinhas'>

            (<?= count($matriculas) ?>) Registro(s) encontrado(s)

        </p>
        <table cellpadding="0" cellspacing="0" class='table table-striped' id='relatorio'>
            <tr>
                <th>Matricula</th>
                <th>Nome</th>
                <th>Turma</th>
                <th></th>
            </tr>
            <? foreach ($matriculas as $matricula): ?>
                <form action="<?php echo Router::url('/boletim/index'); ?>" method="GET">
                    <tr>
                        <td><?= $matricula["Matricula"]["codigo"] ?></td>
                        <td><?= $matricula["Aluno"]["nome"] ?></td>
                        <td><?= $matricula["Turma"]["nome"] ?></td>
                        <td><?= $this->Html->link(__d('cake', "Emitir Boletim", 'boletim'), array('action' => "gerarBoletim/{$matricula["Matricula"]["id"]}"), array('class' => 'btn btn-success','target' => '_blank')); ?>
                    </tr>
                </form>
            <? endforeach; ?>
        </table>


    </div>
</div>






