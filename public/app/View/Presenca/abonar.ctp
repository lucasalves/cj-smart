<div>
    <h3>
        Abonar Falta
    </h3>
    <div class="row-fluid">
        <div  class="navbar-form pull-left main_pesquisa">
            <form action="<?php echo Router::url('/presenca/abonar'); ?>" method="GET">
                <input type="text" id="valorPesquisa" class="valorPesquisa" name="nome" value="<?= $nome_pesquisa ?>" />
                <button class="btn" id="search">Pesquisar aluno por nome</button>
            </form>
        </div>
    </div>

    <div class="row-fluid">
        <p class='totalLinhas'>

            (<?= count($faltas) ?>) Registro(s) encontrado(s)

        </p>
        <table cellpadding="0" cellspacing="0" class='table table-striped' id='relatorio'>
            <tr>
                <th>Matricula</th>
                <th>Nome</th>
                <th>Data</th>
                <th>Abonar</th>
                <th></th>
            </tr>
            <? foreach ($faltas as $falta): ?>
                <form action="<?php echo Router::url('/presenca/abonar'); ?>" method="GET">
                    <tr>
                        <td><?= $falta["Matricula"]["codigo"] ?></td>
                        <td><input type="hidden" name="nome" value="<?= $nome_pesquisa ?>" /><?= $nome ?></td>
                        <td><?= $falta["Aula"]["data"] ?></td>
                        <td>
                            <? if ($falta["Presenca"]["status"] == 'Abonado') { ?>
                                <span class='badge'>Falta Abonada</span>
                            <? } else { ?>
                                <input type="hidden" name="presenca_id" value="<?= $falta["Presenca"]["id"] ?>" />
                                <button class="btn btn-small btn-danger">Abonar Falta</button>
                            <? } ?>

                        </td>
                        <td></td>
                    </tr>
                </form>
            <? endforeach; ?>
        </table>


    </div>
</div>





